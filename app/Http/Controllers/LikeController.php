<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class LikeController extends Controller
{

    /**
     * Undocumented function
     *
     * @param Like $like
     * @param Prefecture $prefecture
     * @return void
     */
    public function toggle(
        Request $request,
        string $prefectureId,
    ): JsonResponse
    {
        $prefecture = Prefecture::find($prefectureId);
        if(is_null($prefecture)){
            Log::info('Cannot find city concerning requested Id: ');
            return response()->json(['error' => 'リクエストIDに紐づく都市が存在しません。'], 404);
        }
        $user = Auth::user();
        Log::info('Auth user is:' .$user);
        $like = Like::where('user_id', $user->id)->where('prefecture_id', $prefecture->id)->first();
        if($like){
            // リクエスト前のハートが色ついているか
            $filled = true;
            $likeId = $like->id;
            Log::info('Deleting Like regarding id:'. $likeId . ' user_id:' . $like->user_id .  ' prefecture_id:' . $like->prefecture_id);
            $like->delete();
            Log::info('Deleted Like regarding id:'. $likeId);
        }else{
            $filled = false;
            $like = Like::create(
                    [
                        'user_id' => $user->id,
                        'prefecture_id' => $prefecture->id,
                    ]
                );
            Log::info('Created Like regarding id:'. $like->id . ' user_id:'. $user->id .  ' prefecture_id:' . $prefecture->id);
        }
        $count = Like::where('prefecture_id', $prefecture->id)->count();
        Log::info('Counted Likes regarding id:'. $like->id . ' user_id:'. $user->id . ' prefecture_id:' . $prefecture->id);
        return response()->json(['status' => 'success', 'count' => $count, 'fulled' => $filled], 200);
    }

    public function index(
        Request $request,
        string $userId,
    ): view
    {
        $authLikes = Like::where('user_id', $userId)->get();
        if(!empty($authLikes)){
            // いいね都市id配列
            $prefectureIds = [];
            foreach($authLikes as $like){
                $prefectureIds[] = $like->prefecture_id;
            }
            // 都市のいいね一括取得
            $wholeLikes = Like::whereIn('prefecture_id', $prefectureIds)->get();
            // いいね都市取得
            $prefectures = Prefecture::whereIn('id', $prefectureIds)->get();
            $forecasts = [];
            foreach($prefectures as $prefecture){
                // いいねフィルター
                $filteredLikes = $wholeLikes->filter(function (Like $like) use ($prefecture) {
                    return $like->prefecture_id === $prefecture->id;
                });
                // いいねカウント
                $likeCount = $filteredLikes->count();
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
                ];
            }
        }else{
            $forecasts = [];
        }
        return view('Like/index', ['forecasts' => $forecasts]);
    }
}
