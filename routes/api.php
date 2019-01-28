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

        // ================== Listas ================== //
        Route::get('/list/processes', 'ListController@getAllProcesses'); // Obtener una lista de procesos
        Route::get('/list/categories', 'ListController@getAllCategories'); // Obtener una lista de categorias

        // ================== User ================== //
        Route::post('/auth', 'Auth\AccessController@auth'); // Autentificar|registrar usuario
        Route::middleware('auth:api')->get('/my_pets', 'UserController@myPets'); // Obtener todas las mascotas del usuario
        Route::middleware('auth:api')->get('/my_favorites', 'UserController@myFavorites'); // Obtener todas las mascotas favoritas del usuario
        Route::middleware('auth:api')->get('/my_sites', 'UserController@mySites'); // Obtener todos los sitios del usuario
        Route::middleware('auth:api')->get('/my_posts', 'UserController@myPosts'); // Obtener todos las publicaciones del usuario
        Route::middleware('auth:api')->get('my_promotions', 'UserController@myPromotions'); // Obtener todos las promociones del usuario
        Route::middleware('auth:api')->get('my_coupons', 'UserController@myCoupons'); // Obtener todos las cupones del usuario

        Route::middleware('auth:api')->post('/favorite/{pet}', 'UserController@favoritePet'); // Añadir favorito
        Route::middleware('auth:api')->put('/unfavorite/{pet}', 'UserController@unFavoritePet'); // Quitar favorito

    // ================== pets ================== //
        Route::post('/pets', 'PetController@index'); // Obtener todas las mascotas
        Route::middleware('auth:api')->get('/pet/{uid}', 'PetController@show'); // Obtener información de una mascota
        Route::middleware('auth:api')->post('/pet', 'PetController@store'); // Registrar una mascotas
        Route::middleware('auth:api')->put('/pet/{uid}', 'PetController@update'); // Editar mascotas
        Route::middleware('auth:api')->delete('pet/{uid}/image/{filename}', 'PetController@destroyImage'); // Eliminar imágen de una mascota
        Route::middleware('auth:api')->delete('pet/{uid}', 'PetController@destroy'); // Desactivar mascota

    // ================== sites ================== //
        Route::post('/sites', 'MinisiteController@index'); // Obtiene todos los sitios
        Route::middleware('auth:api')->post('site', 'MinisiteController@store'); // Registra un sitio
        Route::middleware('auth:api')->put('site/{uid}', 'MinisiteController@update'); // Edita un sitio

    // ================== Posts ================== //
        Route::get('/posts', 'PostController@index'); // Obtiene todas las publicaciones
        Route::middleware('auth:api')->post('/post', 'PostController@store'); // Registrar una publicación
        Route::middleware('auth:api')->put('/post/{uid}', 'PostController@update'); // Edita una publicacóo

    // ================== CODE ================== //
        Route::middleware('auth:api')->get('promotions', 'PromotionController@index'); // Obtiene todos los códigos de promición
        Route::middleware('auth:api')->post('promotion', 'PromotionController@store'); // Registra una promoción
        Route::middleware('auth:api')->delete('promotion/{promotion}', 'PromotionController@destroy'); // Desactiva una promoción

        Route::middleware('auth:api')->put('promotion/{promotion}/{user}/redeem', 'PromotionController@redeemCoupon'); // Canjear copón
        Route::middleware('auth:api')->get('promotion/{promotion}/users', 'PromotionController@getUsers'); // Obtiene todos los códigos de promición
        Route::middleware('auth:api')->post('promotion/{promotion}/coupons', 'PromotionController@attachCoupons'); // Añadir una promoción
});
