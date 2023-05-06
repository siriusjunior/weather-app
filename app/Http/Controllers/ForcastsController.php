<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ForcastsController extends Controller
{
    /**
     * 全国の天気予報を表示
     * @return view
     */
    public function index()
    {
        $prefectures = Prefecture::whereIn('name', );

        // $workingTimestampRecordDBs = WorkingTimestampRecordDB::whereDate('date', $date)
        //     ->whereIn('user_id', $userIdStrings)
        //     ->get();
        foreach($prefectures as $prefecture){
            // キャッシュキー定義
            $cache_key = "forecast_{$prefecture->name}";
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
            $temp = round($data['main']['temp'] - 273.15, 2);
            $forecasts[$prefecture->name] = [
                'time' => $datetime,
                'temp' => $temp,
                'weather' => $data['weather']['description'],
            ];
            return view('Home/index', ['forecasts' => $forecasts]);
        }
    }
}
