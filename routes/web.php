<?php

use App\Http\Controllers\ForecastController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// // ログインユーザーのみ
// Route::middleware('auth')->group(function () {

// }

// トップページ表示
Route::get('/', [ForecastController::class, 'index'])
    ->name('home.index')
    ->block($lockSeconds = 5, $waitSeconds = 5);

//選択した都道府県の３時間ごとの天気を表示
Route::get('/forecasts/{prefectureId}', [ForecastController::class, 'show'])
    ->name('forecasts.show')
    ->block($lockSeconds = 5, $waitSeconds = 5);
;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // 認証ユーザーのいいねボタン切替え
    Route::post('/likes/{prefectureId}', [LikeController::class, 'toggle'])->block($lockSeconds = 5, $waitSeconds = 5);;
    Route::get('/users/{userId}/likes', [LikeController::class, 'index'])->name('likes.index')->block($lockSeconds = 5, $waitSeconds = 5);
});

require __DIR__.'/auth.php';
