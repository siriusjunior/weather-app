<x-layout title="{{ $name }}の3時間ごとの天気">
    <div class="d-flex align-items-center">
        <h2 class="smooth mr-3">{{ $name }}の3時間ごとの天気</h2>
        <div>
            <i class="smooth d-block"> {{Carbon\Carbon::now()->isoFormat('M月DD日 H:mm') }}時点</i>
            <!-- <i class="d-block">都市名・予報・平均気温</i> -->
        </div>
    </div>
    <hr class="my-0 mb-4" size="10" color="orange">
    @if(!empty($forecasts))
        <div class="forecasts__wrapper">
            <ul>
                @foreach($forecasts as $time => $forecast)
                    <li>
                        <div class="w-100">
                            <span class="forecast__time forecasts__city_mg">{{$time}}</span>
                            <span class="forecast__weather">{{$forecast['weather']}}</span>
                            <span class="forecast__temp">{{$forecast['temp']}}℃</span>
                        </div>
                    </li>
                    <hr class="">
                @endforeach
            </ul>
        </div>
    @else
        <i>※天気予報を取得できません</i>
        <hr>
    @endif
</x-layout>
