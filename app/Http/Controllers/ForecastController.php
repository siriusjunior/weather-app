<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Prefecture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ForecastController extends Controller
{
    /**
     * 全国の天気予報を表示
     * @return view
     */
    public function index(): view
    {
        // トップ表示都市を取得
        $topPrefs = Prefecture::where('is_representative', 1)->get();
        // いいね取得
        $prefectureIds = [];
        foreach ($topPrefs as $prefecture) {
            $prefectureIds[] = $prefecture->id;
        }
        $likes = Like::whereIn('prefecture_id', $prefectureIds)->get();
        if (!is_null($topPrefs)) {
            $forecasts = [];
            foreach ($topPrefs as $prefecture) {
                // いいねフィルター
                $filteredLikes = $likes->filter(function (Like $like) use ($prefecture) {
                    return $like->prefecture_id === $prefecture->id;
                });
                // いいねカウント
                $likeCount = $filteredLikes->count();
                // ログインユーザーいいね判別
                $authUser = Auth::user();
                if (!is_null($authUser)) {
                    $authLiked = $this->checkUserLiked($filteredLikes, $authUser);
                } else {
                    $authLiked = false;
                }
                // キャッシュキー定義
                $cache_key = "forecast_{$prefecture->id}";
                // キャッシュ不在ならAPI取得・キャッシュ保存(有効期限を1時間(60分×60秒))
                $data = Cache::remember($cache_key, 60 * 60, function () use ($prefecture) {
                    $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                        'lat' => $prefecture->latitude,
                        'lon' => $prefecture->longitude,
                        'lang' => 'ja',
                        'appid' => config('services.open_weather.api_key'),
                    ]);
                    return $response->json();
                });
                $datetime = Carbon::createFromTimestamp($data['dt'], 'Asia/Tokyo');
                //ケルビンから摂氏に変換
                $temp = round($data['main']['temp'] - 273.15, 1);
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
                $weather = $weatherMapping[$description] ?? $description;
                $forecasts[$prefecture->name] = [
                    'id' => $prefecture->id,
                    'time' => $datetime,
                    'temp' => $temp,
                    'weather' => $weather,
                    'likeCount' => $likeCount,
                    'authLiked' => $authLiked,
                ];
            }
        } else {
            $forecasts = [];
        }
        return view('Home/index', ['forecasts' => $forecasts]);
    }

    /**
     * 選択した都道府県の３時間ごとの天気を表示
     * @return view
     */
    public function show(string $prefectureId): view
    {
        // トップ表示都市を取得
        $prefecture = Prefecture::where('id', $prefectureId)->firstOrFail();
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

    private function checkUserLiked(Collection $likes, User $user): bool
    {
        $userId = $user->id;
        return $likes->contains(function (Like $like) use ($userId) {
            return $like->user_id === $userId;
        });
    }
}
