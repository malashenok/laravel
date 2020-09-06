<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('Home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'isAdmin', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.',
        'middleware' => ['isAdmin','auth']
    ], function () {

        //CRUD News
        Route::get('/', 'NewsController@index')->name('news.index');

        Route::match('get', '/news/create','NewsController@create')->name('news.create');
        Route::match('post', '/news/create','NewsController@store')->name('news.store')
                    ->middleware('newsValidate');
        Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit');
        Route::post('/news/update/{news}', 'NewsController@update')->name('news.update')
                    ->middleware('newsValidate');

        Route::get('/news/destroy/{news}', 'NewsController@destroy')->name('news.destroy');

        //парсер новостей
        Route::get('news/parser', 'ParserController@index')->name('news.parser');

        //источники новостей
        Route::get('/resources', 'ResourceController@index')->name('resources.index');
        Route::get('/resources/create','ResourceController@create')->name('resources.create');
        Route::post('/resources/create','ResourceController@store')->name('resources.store');
        Route::get('/resources/edit/{resource}', 'ResourceController@edit')->name('resources.edit');
        Route::post('/resources/update/{resource}', 'ResourceController@update')->name('resources.update');
        Route::get('/resources/destroy/{resource}', 'ResourceController@destroy')->name('resources.destroy');


        //CRUD Category, done by resource
        Route::resource('/category', 'CategoryController');

        //Admin user profiles
        Route::get('/profiles', 'UsersController@index')->name('profiles.index');
        Route::get('/profiles/edit/{user}', 'UsersController@edit')->name('profiles.edit');
        Route::post('/profiles/update/{user}', 'UsersController@update')->name('profiles.update');
        Route::get('/profiles/destroy/{user}', 'UsersController@destroy')->name('profiles.destroy');
        //set admin role
        Route::match(['post','get'], '/setAdmin/{user}', 'UsersController@setAdmin')->name('profiles.setAdmin');


});
//Новости
Route::group(
    [
        'prefix' => 'news'
    ], function() {
        Route::get('/', 'NewsController@index')->name('News');
        Route::get('/{news}', 'NewsController@show')->name('NewsOne')
                        ->where('id','[0-9]+');
});
//Категории
Route::group(
    [
        'prefix' => 'category'
    ], function() {
    Route::get('/', 'CategoryController@index')->name('Category');
    Route::get('/{slug}', 'CategoryController@show')->name('CategoryOne')
        ->where('slug', '[A-Za-z]+');
});

Route::match(['post', 'get'], '/profile', 'ProfileController@update')->name('profile');

//Соцсети авторизация
Route::get('/auth/vk', 'LoginController@login')->name('vklogin');
Route::get('/auth/vk/response', 'LoginController@response')->name('vkResponse');
Route::get('/auth/git', 'LoginController@login')->name('gitLogin');
Route::get('/auth/git/response', 'LoginController@response')->name('gitResponse');

Auth::routes();
