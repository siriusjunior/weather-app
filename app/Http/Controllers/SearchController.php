<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Prefecture;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(
        Request $request
    ): JsonResponse {
        $query = $request->input('query');
        $results = Prefecture::where('furigana', 'LIKE', $query . '%')->get();
        return response()->json($results);
    }

    /**
     * 検索した都道府県の３時間ごとの天気を表示
     * @return view
     */
    public function show(Request $request): View|RedirectResponse
    {
        $name = $request->input('name');
        try {
            // トップ表示都市を取得
            $prefecture = Prefecture::where('name', $name)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home.index')->with('error', '指定された都市は見つかりません。「' . $request->name . '」');
        }
        // トップ表示都市を取得
        $prefecture = Prefecture::where('id', $prefecture->id)->firstOrFail();
        $count = Like::where('prefecture_id', $prefecture->id)->count();
        // キャッシュキー定義
        $cache_key = "detail_{$prefecture->id}";
        // キャッシュ不在ならAPI取得・キャッシュ保存(有効期限を1時間(60分×60秒))
        $wholeData = Cache::remember($cache_key, 60 * 60, function () use ($prefecture) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
                'lat' => $prefecture->latitude,
                'lon' => $prefecture->longitude,
                'lang' => 'ja',
                'appid' => config('services.open_weather.api_key'),
            ]);
            return $response->json();
        });
        // 要素を取得(直近24時間)
        $hoursData = array_slice($wholeData['list'], 0, 8);
        $forecasts = [];
        foreach ($hoursData as $data) {
            $datetime = Carbon::createFromTimestamp($data['dt'], 'Asia/Tokyo')->isoFormat('M月DD日 H:mm');
            //ケルビンから摂氏に変換
            $temp = round($data['main']['temp'] - 273.15, 1);
            $weather = null;
            $weatherMapping = [
                '曇りがち' => 'くもり',
                '厚い雲' => 'くもり',
                '薄い雲' => 'くもり',
                '雲' => 'くもり',
                '霧' => 'くもり',
                '大雨' => '雨',
                '大雨' => '雨',
                '小雨' => '雨',
                '強い雨' => '雨',
                '弱いにわか雨' => '雨',
                '強いにわか雨' => '雨',
                'にわか雨' => '雨',
                '適度な雨' => '雨',
                '晴天' => '晴れ',
            ];
            $description = $data['weather'][0]['description'];
            // 配列内の書き換え
            $weather = $weatherMapping[$description] ?? $description;
            $forecasts[$datetime] = [
                'temp' => $temp,
                'weather' => $weather,
            ];
        }
        return view('Forecast/show', ['forecasts' => $forecasts, 'prefecture' => $prefecture, 'count' => $count]);
    }
}
