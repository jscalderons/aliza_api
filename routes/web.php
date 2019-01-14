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

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Admin')->group(function() {
        // ================== PETS ================== //
        // [GET]
        Route::get('pets', 'PetController@index')->name('pets');

        // [POST]
        Route::post('/pet/{uid}/approve', 'PetController@approve')->name('pet.approve');

        // ================== POSTS ================== //
        // [GET]
        Route::get('posts', 'PostController@index')->name('posts');

    });
});
