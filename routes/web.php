<?php

use Illuminate\Support\Facades\Route;



Route::get('/contacts', 'App\Http\Controllers\CatalogController@contacts')->name('contacts');
Route::get('/game/{IdGame}', 'App\Http\Controllers\CatalogController@game')->name('game');
Route::get('/', 'App\Http\Controllers\CatalogController@home')->name('myhome');
Route::get('/support', 'App\Http\Controllers\CatalogController@support')->name('support');
Route::get('/catalog',  'App\Http\Controllers\CatalogController@catalog')->name('catalog');
Route::get('/catalog/search',  'App\Http\Controllers\CatalogController@search')->name('search');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');
Route::get('/gameadd', 'App\Http\Controllers\GameController@index')->name('gameadd')->middleware('auth', 'is_role');
Route::post('/gameadd', 'App\Http\Controllers\GameController@gameAdd')->name('game-confirm');
Route::get('/useradd', 'App\Http\Controllers\UserController@indexUserAdd')->name('indexUserAdd');
Route::post('/useradd', 'App\Http\Controllers\UserController@userAdd')->name('userAdd');
Route::get('/gameedit/{IdGame}', 'App\Http\Controllers\GameController@gameEditForm')->name('game-edit')->middleware('auth', 'is_role');
Route::post('/gameedit/{IdGame}', 'App\Http\Controllers\GameController@gameEdit')->name('gameEdit');
Route::get('/useredit/{IdUser}', 'App\Http\Controllers\UserController@indexUserEdit')->name('indexUserEdit');
Route::post('/useredit/{IdUser}', 'App\Http\Controllers\UserController@userEdit')->name('userEdit');
Route::get('/gameremove/{IdGame}', 'App\Http\Controllers\GameController@gameRemove')->name('gameRemove')->middleware('auth', 'is_role');
Route::get('/userremove/{IdUser}', 'App\Http\Controllers\UserController@userRemove')->name('userRemove');


Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user')->middleware('auth', 'is_admin');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


