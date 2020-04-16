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

Route::get('/','Site\HomeController@index');

Route::get('blog','Site\BlogController@index')->name('blog');
Route::get('site','Site\BlogController@site')->name('site');

Route::prefix('painel')->group(function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin');
   
    Route::get('login','Admin\Auth\LoginController@index')->name('login');
    Route::post('login','Admin\Auth\LoginController@authenticate');

    Route::post('logout','Admin\Auth\LoginController@logout')->name('logout');

    Route::get('register','Admin\Auth\RegisterController@index')->name('register');
    Route::post('register','Admin\Auth\RegisterController@register');

    Route::resource('users','Admin\UserController');

    Route::resource('client','Admin\ClientController');

    Route::resource('pages','Admin\PageController');

    Route::resource('blog','Admin\BlogController');    

    Route::resource('service','Admin\ServiceController');
    Route::get('service/done/{id}','Admin\ServiceController@done')->name('service.done');

    Route::get('profile','Admin\ProfileController@index')->name('profile');
    Route::put('profile/save','Admin\ProfileController@save')->name('profile.save');

    Route::get('settings','Admin\SettingController@index')->name('settings');
    Route::put('settings/save','Admin\SettingController@save')->name('settings.save');
    Route::get('settings/create','Admin\SettingController@create')->name('settings.create');
});

Route::fallback('Site\PageController@index');