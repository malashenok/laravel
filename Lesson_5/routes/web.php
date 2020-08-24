<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('Home');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.'
    ], function () {
        Route::get('/', 'IndexController@index')->name('index');

        Route::match(['get','post'], '/create','IndexController@create')->name('create');
        Route::match(['get','post'], '/delete', 'IndexController@delete')->name('delete');
        Route::match(['get','post'], '/download','IndexController@download')->name('download');
});

Route::group(
    [
        'prefix' => 'news'
    ], function() {
        Route::get('/', 'NewsController@index')->name('News');
        Route::get('/{id}', 'NewsController@show')->name('NewsOne')
                        ->where('id','[0-9]+');

        Route::group(
            [
                'prefix' => 'category'
            ], function() {
            Route::get('/', 'CategoryController@index')->name('Category');
            Route::get('/{slug}', 'CategoryController@show')->name('CategoryOne')
                ->where('slug', '[A-Za-z]+');;
        });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/vue','vue')->name('vue');
