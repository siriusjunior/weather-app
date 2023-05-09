# WeatherApp
<img width="600" alt="スクリーンショット 2023-05-09 21 34 30" src="https://github.com/siriusjunior/weather-app/assets/74279208/e95ec834-a405-4d44-8de1-000592b78eaf">

- 全国の現在の天気がわかります。
- 気になった地域を選択すると3時間ごとの天気が24時間先まで予報を確認できます。
- 気になった地域をいいねすることで、気になった地方を登録できます。

## 使用技術
### フロントエンド

- HTML/CSS
- Bootstrap
- JavaScript


### バックエンド

- PHP: 8.0.2 
- Laravel: 9.52.7
- Nginx
- MySQL: 5.7.33

###　開発環境

- GitHub（Pull requests, Issues）
- docker-compose（開発）

## 実装機能

- いまの全国の天気表示機能(OpenWeatherMap API)
- 選択した地域の3時間ごとの天気表示(外部API取得でキャッシュ機能)
- 都市名の入力で都市名の候補をリスト表示するサジェスト機能(Ajax,APIモード)
- いいね作成・削除機能(Ajax)
- いいね登録した都市を表示する機能
- ログイン機能(Laravel Breeze)
    - ログイン画面表示
    - ログイン処理
    - ログアウト処理

### いまの全国の天気表示機能

冒頭にも説明したとおり、全国の現時点での天気情報をWeatherAPI(外部)から取得してきています。
なお、ページ遷移するたびにAPIにデータを取得しに行くのでは、ローディング時間が毎回無駄にかかってしまいます。
なので外部APIのデータ取得は初回ローディングにとどめ、２回目以降はキャッシュ時間の有効時間が切れるまではキャッシュデータを保持するようにしています。
```php
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
```

### 選択した地域の3時間ごとの天気表示
<img width="600" alt="スクリーンショット 2023-05-09 22 33 49" src="https://github.com/siriusjunior/weather-app/assets/74279208/053c8a08-df75-4096-a559-d315b34f4d69">

こちらはトップページで選択された都市に対して、３時間ごとの天気予報を表示するページです。
同様に、キャッシュの有効期限まではデータを保持するようにしています。
こちらはOpenWeatherAPIの3時間刻みで取得できるAPIを使用し、現在の天気を取得するものとは異なっています。
なお、ログインをしていなくてもトップページと同様に閲覧ができます。
```php
$wholeData = Cache::remember($cache_key, 60 * 60, function () use ($prefecture) {
    $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
        'lat' => $prefecture->latitude,
        'lon' => $prefecture->longitude,
        'lang' => 'ja',
        'appid' => config('services.open_weather.api_key'),
    ]);
    return $response->json();
});
```
