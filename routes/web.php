<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');


    //Данный маршрут дергает метод index контроллера RouteManagerController который выдает дерево всех доступных
    //маршрутов авторизированного пользователя
    Route::get('route', [App\Http\Controllers\Admin\RouteManagerController::class , 'index']);

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', function () {
            return view('layouts.admin');
        });

        //маршруты регистрации
        Route::get('register', [App\Http\Controllers\Auth\RegisterController::class , 'showRegistrationForm'])->name('register');
        Route::post('register', [App\Http\Controllers\Auth\RegisterController::class , 'register']);

        //маршруты user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/current', [ App\Http\Controllers\Admin\UserAccess::class, 'current']);
            Route::get('/', [ App\Http\Controllers\Admin\UserAccess::class, 'show'])->name('user');
            Route::get('/search', [ App\Http\Controllers\Admin\UserAccess::class, 'search'])->name('search');
            Route::get('/search_ajax', [ App\Http\Controllers\Admin\AjaxSearch::class, 'search'])->name('search_ajax');

            //Тест (маршруты для Алексея)
            Route::get('/{id}', [ App\Http\Controllers\Admin\UserAccess::class, 'userView'])->where(['id' => '[0-9]+']);
//            Route::get('/', [ App\Http\Controllers\Admin\UserAccess::class, 'usersView']);
            Route::get('/create_form', [ App\Http\Controllers\Admin\UserAccess::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\UserAccess::class, 'createUser'])->name('create');
            Route::post('/{id}/update', [ App\Http\Controllers\Admin\UserAccess::class, 'updateUser'])->where(['id' => '[0-9]+']);
        });

        //маршруты group
        Route::group(['prefix' => 'group'], function () {
            //просмотр всего списка имеющихся групп
            Route::get('/', [ App\Http\Controllers\Admin\GroupAccess::class, 'showGroups']);
            //добавление группы
            Route::get('/create_form', [ App\Http\Controllers\Admin\GroupAccess::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\GroupAccess::class, 'createGroup'])->name('create_group');
            //редактирование группы
            Route::get('/{id}', [ App\Http\Controllers\Admin\GroupAccess::class, 'groupView'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/update', [ App\Http\Controllers\Admin\GroupAccess::class, 'updateGroups'])->where(['id' => '[0-9]+']);
        });

        //маршруты perm
        Route::group(['prefix' => 'perm'], function () {
            //просмотр всего списка perm
            Route::get('/', [ App\Http\Controllers\Admin\Perm::class, 'showPerm']);
            //добавление perm
            Route::get('/create_form', [ App\Http\Controllers\Admin\Perm::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\Perm::class, 'createPerm'])->name('create_perm');
            Route::post('/{id}/delete', [ App\Http\Controllers\Admin\Perm::class, 'deletePerm'])->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'materials'], function () {
            //просмотр всего списка materials
            Route::get('/', [ App\Http\Controllers\Admin\MaterialList::class, 'showMaterial']);
            //добавление materials
            Route::get('/create_form', [ App\Http\Controllers\Admin\MaterialList::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\MaterialList::class, 'createMaterial'])->name('create_material');
            //редактирование materials
            Route::get('/{id}', [ App\Http\Controllers\Admin\MaterialList::class, 'materialView'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/update', [ App\Http\Controllers\Admin\MaterialList::class, 'updateMaterials'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/delete', [ App\Http\Controllers\Admin\MaterialList::class, 'deleteMaterials'])->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'stages'], function () {
            //просмотр всего списка stages
            Route::get('/', [ App\Http\Controllers\Admin\StageAccess::class, 'showStages']);
            //добавление stages
            Route::get('/create_form', [ App\Http\Controllers\Admin\StageAccess::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\StageAccess::class, 'createStage'])->name('create_stage');
            //редактирование stages
            Route::get('/{id}', [ App\Http\Controllers\Admin\StageAccess::class, 'stageView'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/update', [ App\Http\Controllers\Admin\StageAccess::class, 'updateStage'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/delete', [ App\Http\Controllers\Admin\StageAccess::class, 'deleteStage'])->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'process'], function () {
            //просмотр всего списка process
            Route::get('/', [ App\Http\Controllers\Admin\ProcessList::class, 'showProcess']);
            //добавление process
            Route::get('/create_form', [ App\Http\Controllers\Admin\ProcessList::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\ProcessList::class, 'createProcess'])->name('create_process');
            //редактирование process
            Route::get('/{id}', [ App\Http\Controllers\Admin\ProcessList::class, 'processView'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/update', [ App\Http\Controllers\Admin\ProcessList::class, 'updateProcess'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/delete', [ App\Http\Controllers\Admin\ProcessList::class, 'deleteProcess'])->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'client'], function () {
            //добавление client
            Route::get('/create_form', [ App\Http\Controllers\Admin\ClientAccess::class, 'createForm']);
            Route::post('/create', [ App\Http\Controllers\Admin\ClientAccess::class, 'createClient'])->name('create_client');
            //редактирование stages
            Route::get('/{id}', [ App\Http\Controllers\Admin\ClientAccess::class, 'clientView'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/update', [ App\Http\Controllers\Admin\ClientAccess::class, 'updateClient'])->where(['id' => '[0-9]+']);
            Route::post('/{id}/delete', [ App\Http\Controllers\Admin\ClientAccess::class, 'deleteClient'])->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'detail'], function () {
            //добавление detail
            Route::get('/create_form', [ App\Http\Controllers\Admin\DetailsController::class, 'index']);
            Route::post('/create', [ App\Http\Controllers\Admin\DetailsController::class, 'createDetail'])->name('create_detail');
            Route::get('/', [ App\Http\Controllers\Admin\DetailsController::class, 'showDetails']);
            Route::get('/{id}', [ App\Http\Controllers\Admin\DetailsController::class, 'showDetailsId'])->where(['id' => '[0-9]+']);
            Route::post('/delete/{id}', [ App\Http\Controllers\Admin\DetailsController::class, 'delete'])->where(['id' => '[0-9]+']);
            Route::get('/form', [ App\Http\Controllers\Admin\DetailsController::class, 'form']);
            Route::post('{id}/update', [ App\Http\Controllers\Admin\DetailsController::class, 'update'])->where(['id' => '[0-9]+']);
        });
    });
});

Route::get('/message', function () {
    return view('message');
})->name('message');

