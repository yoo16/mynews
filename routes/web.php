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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news', 'Admin\NewsController@index');

    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');

    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');

    Route::get('news/delete', 'Admin\NewsController@delete');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile', 'Admin\ProfileController@index');

    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');

    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');

    Route::get('profile/delete', 'Admin\ProfileController@delete');
});

// Route::group(['prefix' => 'admin/news', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
//     Route::get('create', 'NewsController@add');
//     Route::post('create', 'NewsController@create');

//     Route::get('edit', 'NewsController@edit');
//     Route::post('edit', 'NewsController@update');
// });

// Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
//     Route::get('create', 'ProfileController@add');
//     Route::post('create', 'ProfileController@create');

//     Route::get('edit', 'ProfileController@edit');
//     Route::post('edit', 'ProfileController@update');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
