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
        // [POST]
        Route::post('/auth', 'Auth\AccessController@auth');

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

    // ================== pets ================== //
        // [GET]
        Route::middleware('auth:api')->get('/pet/{uid}', 'PetController@show'); // Obtener todas las mascotas del usuario

        // [POST]
        Route::post('/pets', 'PetController@index'); // Obtener todas las mascotas
        Route::middleware('auth:api')->post('/pet', 'PetController@store'); // nueva mascotas

        // [PUT]
        Route::middleware('auth:api')->put('/pet/{uid}', 'PetController@update'); // editar mascotas

        // [DELETE]
        Route::middleware('auth:api')->delete('pet/{uid}/image/{filename}', 'PetController@destroyImage'); // Eliminar imagenes


    // ================== minisites ================== //
        // [GET]
        Route::get('/sites', 'MinisiteController@index');

        // [POST]
        Route::middleware('auth:api')->post('/site', 'MinisiteController@store');

        // [PUT]
        Route::middleware('auth:api')->put('/site/{uid}', 'MinisiteController@update');

    // ================== Posts ================== //
        // [GET]
        Route::get('/posts', 'PostController@index'); // Obtener todos las publicaciones

        // [POST]
        Route::middleware('auth:api')->post('/post', 'PostController@store'); // Registrar una nueva publicacion

        // [PUT]
        Route::middleware('auth:api')->put('/post/{uid}', 'PostController@update');

    // ================== Test ================== //
        // Route::post('/test', 'PetController@upload'); // Registrar una nueva publicacion

});
