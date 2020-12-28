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

Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');

Route::group(
    [
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function() {
    Route::get('news', 'NewsController@index')->name('admin.news');
    Route::get('news/create', 'NewsController@add')->name('admin.news.create');
    Route::post('news/create', 'NewsController@create')->name('admin.news.create');
    Route::get('news/edit', 'NewsController@edit')->name('admin.news.edit');
    Route::post('news/edit', 'NewsController@update')->name('admin.news.update');
    Route::get('news/delete', 'NewsController@delete')->name('admin.news.delete');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function() {
    Route::get('profile', 'ProfileController@index')->name('admin.profile');
    Route::get('profile/create', 'ProfileController@add')->name('admin.profile.add');
    Route::post('profile/create', 'ProfileController@create')->name('admin.profile.create');
    Route::get('profile/edit', 'ProfileController@edit')->name('admin.profile.edit');
    Route::post('profile/edit', 'ProfileController@update')->name('admin.profile.update');
    Route::get('profile/delete', 'ProfileController@delete')->name('admin.profile.delete');
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
