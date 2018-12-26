<?php

// use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function() {

    // access
    Route::post('/auth', 'Auth\AccessController@auth');

    // pets
    Route::get('/pets', 'PetController@index');
    Route::middleware('auth:api')->post('/pets', 'PetController@store');

    // minisites
    Route::get('/minisites', 'MinisiteController@index');

    // Listas
    Route::get('/list/processes', 'ListController@getAllProcess');
});
