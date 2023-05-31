<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\API\KPController;
use app\Http\Controllers\API\SkripsiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('upload', [\App\Http\Controllers\API\KpsihController::class, 'uploadfile']);
// Route::post('kp2/store', [\App\Http\Controllers\API\KpsihController::class, 'store']);
Route::get('kp', [\App\Http\Controllers\API\KPController::class, 'index']);
Route::get('kp/{id}', [\App\Http\Controllers\API\KPController::class, 'show']);
Route::get('skripsi', [\App\Http\Controllers\API\SkripsiController::class, 'index']);
// Route::post('skripsi/store', [\App\Http\Controllers\API\SkripsiController::class, 'store']);
Route::get('skripsi/{id}', [\App\Http\Controllers\API\SkripsiController::class, 'show']);

Route::get('gallery', [\App\Http\Controllers\API\GalleryController::class, 'index']);
Route::post('gallery/store', [\App\Http\Controllers\API\GalleryController::class, 'store']);

Route::get('post', [\App\Http\Controllers\API\PostController::class, 'index']);
Route::post('post/store', [\App\Http\Controllers\API\PostController::class, 'store']);

Route::post('login', [\App\Http\Controllers\API\UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
Route::get('user',[\App\Http\Controllers\API\UserController::class, 'user'] );
Route::post('logout',[\App\Http\Controllers\API\UserController::class, 'logout'] );
});
