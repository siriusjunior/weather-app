<x-layout title="TOP | 全国の天気">
    <div class="d-flex align-items-center">
        <h2 class="smooth mr-3">全国の天気</h2>
        <div class="d-flex align-items-center">
            <i class="smooth d-block mr-3"> {{Carbon\Carbon::now()->isoFormat('M月DD日 H:mm') }}時点</i>
            <a href="{{ route('home.index') }}" type="button" class="smooth btn btn-light">更新</a>
            <!-- <i class="d-block">都市名・予報・平均気温</i> -->
        </div>
    </div>
    <hr class="my-0 mb-4" size="10" color="orange">
    @if(!empty($forecasts))
        <div class="forecasts__wrapper">
            <ul>
                @foreach($forecasts as $name => $forecast)
                    <li>
                        <div class="w-100">
                            <a class="forecast__link" href="{{ route('forecasts.show', ['prefectureId' => $forecast['id'] ]) }}">
                                <span class="forecast__city forecasts__city_mg">{{$name}}</span>
                                <span class="forecast__weather">{{$forecast['weather']}}</span>
                                <span class="forecast__temp">{{$forecast['temp']}}℃</span>
                            </a>
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
