<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('Home');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.'
    ], function () {
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/test1', 'IndexController@test1')->name('test1');
        Route::get('/test2', 'IndexController@test2')->name('test2');
});

Route::group(
    [
        'prefix' => 'news'
    ], function() {
        Route::get('/', 'NewsController@index')->name('News');
        Route::get('/{id}', 'NewsController@show')->name('NewsOne')
                        ->where('id','[0-9]+');
        Route::get('/category', 'CategoryController@index')->name('Category');
        Route::get('/category/{slug}', 'CategoryController@show')->name('CategoryOne')
                        ->where('slug', '[A-Za-z]+');;
});
