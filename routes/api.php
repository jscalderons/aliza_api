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

    // ================== access ================== //
    Route::post('/auth', 'Auth\AccessController@auth');

    // ================== pets ================== //
        // [GET]
        Route::middleware('auth:api')->get('/pet/{uid}', 'PetController@show'); // Obtener todas las mascotas del usuario

        // [POST]
        Route::middleware('auth:api')->post('/pet/create', 'PetController@store'); // nueva mascotas
        Route::post('/pets', 'PetController@index'); // Obtener todas las mascotas

    // ================== minisites ================== //
        // [GET]
        Route::get('/sites', 'MinisiteController@index');

        // [POST]
        Route::middleware('auth:api')->post('/site/create', 'MinisiteController@store');

    // ================== Listas ================== //
        // [GET]
        Route::get('/list/processes', 'ListController@getAllProcesses');
        Route::get('/list/categories', 'ListController@getAllCategories');

    // ================== User ================== //
        // [GET]
        Route::middleware('auth:api')->get('/my_favorites', 'UserController@myFavorites'); // Obtener todas las mascotas del usuario
        Route::middleware('auth:api')->get('/my_pets', 'UserController@myPets'); // Obtener todas las mascotas del usuario
        Route::middleware('auth:api')->get('/my_sites', 'UserController@mySites'); // Obtener todas las mascotas del usuario
        Route::middleware('auth:api')->get('/my_posts', 'UserController@myPosts'); // Obtener todas las mascotas del usuario

        // [POST]
        Route::middleware('auth:api')->post('/favorite/{pet}', 'UserController@favoritePet'); // agregar favorito

        // [PUT]
        Route::middleware('auth:api')->put('/unfavorite/{pet}', 'UserController@unFavoritePet'); // eliminar favorito

    // ================== Posts ================== //
        // [GET]
        Route::get('/posts', 'PostController@index'); // Obtener todos las publicaciones

        // [POST]
        Route::middleware('auth:api')->post('/post/create', 'PostController@store'); // Registrar una nueva publicacion
});
