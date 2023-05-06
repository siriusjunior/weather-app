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
        // トップ表示都市を取得
        $topAreas = Prefecture::where('is_representative', 1)->get();
        if(!is_null($topAreas)){
            $forecasts = [];
            foreach($topAreas as $area){
                // キャッシュキー定義
                $cache_key = "forecast_{$area->name}";
                // キャッシュ不在ならAPI取得・キャッシュ保存(有効期限を1時間(60分×60秒))
                $data = Cache::remember($cache_key, 60 * 60, function () use ($area) {
                    $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                        'lat' => $area->latitude,
                        'lon' => $area->longitude,
                        'lang' => 'ja',
                        'appid' => config('services.open_weather.api_key'),
                    ]);
                    return $response->json();
                });
                $datetime = Carbon::createFromTimestamp($data['dt'], 'Asia/Tokyo');
                //ケルビンから摂氏に変換
                $temp = round($data['main']['temp'] - 273.15, 1);
                if($data['weather'][0]['description'] === '曇りがち'){
                    $wheather = 'くもり';
                }elseif($data['weather'][0]['description'] === '適度な雨'){
                    $wheather = '雨';
                }elseif($data['weather'][0]['description'] === '弱いにわか雨'){
                    $wheather = '小雨';
                }elseif($data['weather'][0]['description'] === '晴天'){
                    $wheather = '晴れ';
                }
                $forecasts[$area->name] = [
                    'time' => $datetime,
                    'temp' => $temp,
                    'weather' => !is_null($wheather) ? $wheather : $data['weather'][0]['description'],
                ];
            }
        }else{
            $forecasts = [];
        }
        return view('Home/index', ['forecasts' => $forecasts]);
    }
}
