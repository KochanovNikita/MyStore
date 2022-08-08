<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

Route::middleware('auth:sanctum')->get('/user', \App\Http\Controllers\API\User\ShowController::class);
Route::middleware('auth:sanctum')->patch('/user/{user}', \App\Http\Controllers\API\User\UpdateControlle::class);


Route::get('/category', [\App\Http\Controllers\API\DetalisController::class, 'category']);
Route::get('/company', [\App\Http\Controllers\API\DetalisController::class, 'company']);
Route::get('/color', [\App\Http\Controllers\API\DetalisController::class, 'color']);

Route::prefix('product')->group(function () {
    Route::get('/', \App\Http\Controllers\API\Product\IndexController::class);
    Route::get('/{product}', \App\Http\Controllers\API\Product\ShowController::class);
    Route::get('/cart/{product}', \App\Http\Controllers\API\Product\CartShowController::class);
    Route::get('/man', [\App\Http\Controllers\API\Product\GenderIndexController::class, 'man']);
    Route::get('/woman', [\App\Http\Controllers\API\Product\GenderIndexController::class, 'woman']);
});

Route::group(['prefix' => 'order', 'middleware' => 'auth:sanctum'], function() {
    Route::post('/', \App\Http\Controllers\API\Order\StoreController::class);
    Route::get('/{user}', \App\Http\Controllers\API\Order\IndexController::class);
});

