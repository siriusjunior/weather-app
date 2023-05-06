<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ForecastsController extends Controller
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
                $cache_key = "forecast_{$area->id}";
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
                    $weather = 'くもり';
                }elseif($data['weather'][0]['description'] === '適度な雨'){
                    $weather = '雨';
                }elseif($data['weather'][0]['description'] === '弱いにわか雨'){
                    $weather = '小雨';
                }elseif($data['weather'][0]['description'] === '晴天'){
                    $weather = '晴れ';
                }
                $forecasts[$area->name] = [
                    'id' => $area->id,
                    'time' => $datetime,
                    'temp' => $temp,
                    'weather' => !is_null($weather) ? $weather : $data['weather'][0]['description'],
                ];
            }
        }else{
            $forecasts = [];
        }
        return view('Home/index', ['forecasts' => $forecasts]);
    }

    /**
     * 選択した都道府県の３時間ごとの天気を表示
     * @return view
     */
    public function show(string $prefectureId)
    {
        // トップ表示都市を取得
        $area = Prefecture::where('id', $prefectureId)->first();
        // キャッシュキー定義
        $cache_key = "detail_{$area->id}";
        // キャッシュ不在ならAPI取得・キャッシュ保存(有効期限を1時間(60分×60秒))
        $wholeData = Cache::remember($cache_key, 60 * 60, function () use ($area) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
                'lat' => $area->latitude,
                'lon' => $area->longitude,
                'lang' => 'ja',
                'appid' => config('services.open_weather.api_key'),
            ]);
            return $response->json();
        });
        // 要素を取得(直近24時間)
        $hoursData = array_slice($wholeData['list'], 0, 8);
        $forecasts = [];
        foreach($hoursData as $data){
            $datetime = Carbon::createFromTimestamp($data['dt'], 'Asia/Tokyo')->isoFormat('M月DD日 H:mm');
            //ケルビンから摂氏に変換
            $temp = round($data['main']['temp'] - 273.15, 1);
            $weather = null;
            if($data['weather'][0]['description'] === '曇りがち'){
                $weather = 'くもり';
            }elseif($data['weather'][0]['description'] === '適度な雨'){
                $weather = '雨';
            }elseif($data['weather'][0]['description'] === '弱いにわか雨'){
                $weather = '小雨';
            }elseif($data['weather'][0]['description'] === '晴天'){
                $weather = '晴れ';
            }
            $forecasts[$datetime] = [
                'temp' => $temp,
                'weather' => !is_null($weather) ? $weather : $data['weather'][0]['description'],
            ];
        }
        return view('Prefecture/show', ['forecasts' => $forecasts, 'name' => $area->name]);
    }
}
