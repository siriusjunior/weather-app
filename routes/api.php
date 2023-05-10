<?php

use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//選択した都道府県の３時間ごとの天気を表示
Route::get('/search', [SearchController::class, 'search'])->name('api.search');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
