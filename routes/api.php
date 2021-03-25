<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/', [App\Http\Controllers\Api\ApiLoginController::class, 'login']);

Route::middleware(['myguard', 'cors'])->group(function () {
    Route::get('/test', [App\Http\Controllers\Api\ApiTestController::class, 'index']);

    //маршруты admin
    Route::group(['prefix' => 'admin'], function () {

        //маршруты user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [ App\Http\Controllers\Admin\UserAccess::class, 'show'])->name('user');
        });

        //маршруты detail
        Route::group(['prefix' => 'detail'], function () {
            Route::post('/create', [ App\Http\Controllers\Admin\DetailsController::class, 'createDetail'])->name('create_detail');
            Route::get('/', [ App\Http\Controllers\Admin\DetailsController::class, 'showDetails']);
            Route::get('/{id}', [ App\Http\Controllers\Admin\DetailsController::class, 'showDetailsId'])->where(['id' => '[0-9]+']);
            Route::post('/delete/{id}', [ App\Http\Controllers\Admin\DetailsController::class, 'delete'])->where(['id' => '[0-9]+']);
            Route::get('/form', [ App\Http\Controllers\Admin\DetailsController::class, 'form']);
            Route::post('{id}/update', [ App\Http\Controllers\Admin\DetailsController::class, 'update'])->where(['id' => '[0-9]+']);
        });

    });
});