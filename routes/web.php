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
    Verb 	    URI 	                Action 	        Route Name
    GET 	    /photos 	            index 	        photos.index
    GET 	    /photos/create 	        create 	        photos.create
    POST 	    /photos 	            store 	        photos.store
    GET 	    /photos/{photo} 	    show 	        photos.show
    GET 	    /photos/{photo}/edit 	edit 	        photos.edit
    PUT/PATCH 	/photos/{photo} 	    update 	        photos.update
    DELETE 	    /photos/{photo} 	    destroy 	    photos.destroy
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
        Route::post('/pet/{uid}/reject', 'PetController@reject')->name('pet.reject');

        // ================== POSTS ================== //
        Route::resource('posts', 'PostController');
    });
});
