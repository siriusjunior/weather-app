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

### 開発環境

- GitHub（Pull requests, Issues）
- docker-compose（開発）

## 実装機能

- いまの全国の天気表示機能(OpenWeatherMap API)
- 選択した地域の3時間ごとの天気表示(外部API取得でキャッシュ機能)
- 都市名の入力で都市名の候補をリスト表示するサジェスト機能(Ajax,APIモード)
- いいね作成・削除機能(Ajax)
- いいね登録した都市を表示する機能
- ログイン・認証機能(Laravel Breeze)
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

### 都市名の入力で都市名の候補をリスト表示するサジェスト機能
<a href="https://gyazo.com/2d54bb3ca6011825dbb39426de44065b"><img src="https://i.gyazo.com/2d54bb3ca6011825dbb39426de44065b.gif" alt="Image from Gyazo" width="500"/></a>

サジェストはAjaxによりフォームの検索語句の前方部分一致で検索をかけています。
```php
class SearchController extends Controller
{
    public function search(
        Request $request
    ): JsonResponse
    {
        $query = $request->input('query');
        $results = Prefecture::where('furigana', 'LIKE', $query . '%')->get();
        return response()->json($results);
    }
}
```
JavaScriptで非同期で取得するとともに、サジェストフォームを切り替えています。
```javascript
const response = await axios.get(`/api/search?query=${trimQuery}`);
            if (response.status === 200) {
                const results = response.data;
                suggestionsList.innerHTML = '';
                suggestionsList.style.display = 'block';
                results.forEach(result => {
                    const list = document.createElement('li');
                    list.textContent = result.name;
```

### いいね作成・削除機能

いいね機能はログインしたユーザーがいいねボタンを押すとカウントが反映されます。Ajaxで切り替わります。

<a href="https://gyazo.com/46448d7259329b3f4ad60ef2f93570f0"><img src="https://i.gyazo.com/46448d7259329b3f4ad60ef2f93570f0.gif" alt="Image from Gyazo" width="500"/></a>

```php
public function toggle(
        Request $request,
        string $prefectureId,
    ): JsonResponse
    {
    (中略)
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
```
いいねの状態の有無がフロントエンドで判断できるように$filledを用意して、データ作成後のカウント総数も取得します。
この時に開発のエラー状況が掴みづらかったので、ログを仕込んだ形になっています。

### いいね登録した都市を表示する機能

ログインしたユーザーに限って、いいねした地域をまとめて確認できるページも用意しました。

<img width="500" alt="スクリーンショット 2023-05-09 22 56 09" src="https://github.com/siriusjunior/weather-app/assets/74279208/683f777b-f13f-46d4-8214-eae2b45eb8ca">

登録している地点がない場合、以下のように反映されます。

<img width="500" alt="スクリーンショット 2023-05-09 22 57 17" src="https://github.com/siriusjunior/weather-app/assets/74279208/8b16a80c-3c81-4df5-9f2d-2e0131bf8cae">

#### コード全体

ログインユーザーを軸にいいねを一括で取得し、さらにそれらの地域IDをまとめていいねを一括で取得しています。
地域ごとに存在するいいねをカウントするとともに、予報を外部APIより取得しています。

```php
public function index(
        Request $request,
        string $userId,
    ): view
    {
        $authLikes = Like::where('user_id', $userId)->get();
        if(!empty($authLikes)){
            // いいねした都市を取得するID用意
            $prefectureIds = [];
            foreach($authLikes as $like){
                $prefectureIds[] = $like->prefecture_id;
            }
            // 都市ごとのいいね一括取得
            $wholeLikes = Like::whereIn('prefecture_id', $prefectureIds)->get();
            // いいねした都市を一括取得
            $prefectures = Prefecture::whereIn('id', $prefectureIds)->get();
            // 都市データ用意
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
```
#### 工夫した点

地域ごとのループでいいねを取得するのではなく、地域のIDを包括して`whereIn`から問い合わせをしてN＋1問題を防いでいます。
```php
$authLikes = Like::where('user_id', $userId)->get();
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
 (中略)
```

