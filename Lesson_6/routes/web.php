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

        //CRUD News
        Route::get('/', 'NewsController@index')->name('news.index');
        Route::match(['get','post'], '/news/create','NewsController@create')->name('news.create');
        Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit');
        Route::post('/news/update/{news}', 'NewsController@update')->name('news.update');
        Route::get('/news/destroy/{news}', 'NewsController@destroy')->name('news.destroy');

        //CRUD Category, done by resources
        Route::resource('/category', 'CategoryController');

        Route::match(['get','post'], '/news/download','IndexController@download')->name('news.download');
        Route::match(['get','post'], '/category/download','IndexController@download')->name('category.download');
});

Route::group(
    [
        'prefix' => 'news'
    ], function() {
        Route::get('/', 'NewsController@index')->name('News');
        Route::get('/{news}', 'NewsController@show')->name('NewsOne')
                        ->where('id','[0-9]+');
});

Route::group(
    [
        'prefix' => 'category'
    ], function() {
    Route::get('/', 'CategoryController@index')->name('Category');
    Route::get('/{slug}', 'CategoryController@show')->name('CategoryOne')
        ->where('slug', '[A-Za-z]+');;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
