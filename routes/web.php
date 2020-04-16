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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth'); // PHP/Laravel 15 投稿したニュース一覧を表示しよう
    Route::post('news/create', 'Admin\NewsController@create');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});


//課題18-3 http://XXXXXX.jp/XXX というアクセスが来たときに、AAAControllerのbbbというActionに渡すRoutingの設定
Route::get('XXX', 'AAAController@bbb');


//課題18-4:admin/profile/createにアクセスしたらProfileControllerのadd Action に、admin/profile/editにアクセスしたらProfileControllerのedit Action に割り当てる

Route::get('/home', 'HomeController@index')->name('home');