<x-layout title="TOP | いいね地域の天気" h2="いいね地域の天気">
    <hr class="my-0 mb-4" size="10" color="orange">
    @if(!empty($forecasts))
        <div class="forecasts__wrapper">
            @foreach($forecasts as $name => $forecast)
                <div class="pl-5 forecast top">
                    <div class="top__heart_wrapper">
                        <span class="heart-wrapper" data-prefecture-id="{{ $forecast['id'] }}">
                            <i class="like-btn fa-lg fa-heart fa-solid" style="color: #f91880;"></i>
                        </span>
                        <span class="count" data-id="{{ $forecast['id'] }}" style="color: #f91880;">{{ $forecast['likeCount'] }}</span>
                    </div>
                    <a class="top__forecast_wrapper forecast__link d-block" href="{{ route('forecasts.show', ['prefectureId' => $forecast['id'] ]) }}">
                        <div class="w-100 py-3">
                            <!-- 地域名 -->
                            <div class="forecast__city">
                                <span class="mr-2 forecasts__city_mg">{{$name}}</span>
                            </div>
                            <!-- 天気アイコン -->
                            @if($forecast['weather'] === '雨')
                            <div class="forecast__icon forecast__weather">
                                <svg id="レイヤー_3" data-name="レイヤー 3" width="50" height="50" viewBox="0 0 200 200"><defs><style>.cls-3{fill:#06a8ff;}.cls-4{fill:none;stroke:#06a8ff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:15px;}</style></defs><title>telop_300</title><path class="cls-3" d="M100,32.5a81,81,0,0,0-81,81H181A81,81,0,0,0,100,32.5Z"/><path class="cls-4" d="M136,158.51a18.05,18.05,0,0,1-18,18h0a18,18,0,0,1-18-18V23.5"/></svg>
                            </div>
                            @elseif($forecast['weather'] === 'くもり')
                            <div class="forecast__icon forecast__weather">
                                <svg id="レイヤー_3" data-name="レイヤー 3" width="50" height="50" viewBox="0 0 200 200"><defs><style>.cls-2{fill:#bdbdbd;}</style></defs><title>telop_200</title><path class="cls-2" d="M162.49,104.4A52.48,52.48,0,1,0,60.69,79.68a42.36,42.36,0,1,0-8.44,83.88H160.49a29.61,29.61,0,0,0,2-59.16Z"/></svg>
                            </div>
                            @elseif($forecast['weather'] === '晴れ')
                                <div class="forecast__icon forecast__weather">
                                    <svg id="レイヤー_3" data-name="レイヤー 3" width="50" height="50" viewBox="0 0 200 200"><defs><style>.cls-1{fill:#f9b22a;}</style></defs><title>telop_100</title><path class="cls-1" d="M190,100,158.35,75.83l5.29-39.47-39.47,5.29L100,10,75.83,41.65,36.36,36.36l5.29,39.47L10,100l31.65,24.17-5.29,39.47,39.47-5.29L100,190l24.17-31.65,39.47,5.29-5.29-39.47Zm-90,62.31A62.31,62.31,0,1,1,162.31,100,62.38,62.38,0,0,1,100,162.31ZM150.1,100A50.1,50.1,0,1,1,100,49.9,50.1,50.1,0,0,1,150.1,100Z"/></svg>
                                </div>
                            @else
                                <div class="forecast__icon forecast__weather">
                                    <span>{{$forecast['weather']}}</span>
                                </div>
                            @endif
                            <!-- 気温 -->
                            <span class="forecast__temp">{{$forecast['temp']}}℃</span>
                        </div>
                    </a>
                    <hr class="my-0">
                </div>
            @endforeach
        </div>
    @else
        <div class="smooth pl-4">
            <i>※登録されたいいね地域はありません。</i>
        </div>
        <hr>
    @endif
</x-layout>
