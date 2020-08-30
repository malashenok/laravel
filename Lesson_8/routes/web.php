<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('Home');

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

        //CRUD Category, done by resource
        Route::resource('/category', 'CategoryController');

        //Admin user profiles
        Route::get('/profiles', 'ProfilesController@index')->name('profiles.index');
        Route::get('/profiles/edit/{user}', 'ProfilesController@edit')->name('profiles.edit');
        Route::post('/profiles/update/{user}', 'ProfilesController@update')->name('profiles.update');
        Route::get('/profiles/destroy/{user}', 'ProfilesController@destroy')->name('profiles.destroy');
        //set admin role
        Route::match(['post','get'], '/setAdmin/{user}', 'ProfilesController@setAdmin')->name('profiles.setAdmin');
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
        ->where('slug', '[A-Za-z]+');
});

//usual profile
Route::match(['post', 'get'], '/profile', 'ProfileController@update')->name('profile');

Auth::routes();

