<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('articles', 'ArticleController@index');

//OJO
Route::get('users', 'UserController@index');

Route::group(['middleware' => ['jwt.verify']], function() {


    Route::get('articles/{article}', 'ArticleController@show');
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{article}', 'ArticleController@update');
    Route::delete('articles/{article}', 'ArticleController@delete');

    //Apuntar al controlador articles para manejar el status
    //Route::put('articles/{article}/status', 'ArticleController@updateStatus');
    //Route::put('articles/{article}/final_comment', 'ArticleController@setFinalComment');

    //IMAGES
    Route::get('images','ImageController@index');
    Route::get('images/{image}','ImageController@show');
    Route::get('images/{image}/image','ImageController@image');
    Route::post('images','ImageController@store');
    Route::put('images/{image}','ImageController@update');
    Route::delete('images/{image}','ImageController@delete');

    //CATEGORIES
    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{category}', 'CategoryController@show');
    Route::post('categories', 'CategoryController@store');
    Route::put('categories/{category}', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@delete');


    //SUBCATEGRIES
    Route::get('subcategories', 'SubCategoryController@index');
    Route::get('subcategories/{subcategory}', 'SubCategoryController@show');
    Route::post('subcategories', 'SubCategoryController@store');
    Route::put('subcategories/{subcategory}', 'SubCategoryController@update');
    Route::delete('subcategories/{subcategory}', 'SubCategoryController@delete');

    //COMENTARIOS
//    Route::get('comentaries', 'ComentaryController@index');
//    Route::get('comentaries/{comentary}', 'ComentaryController@show');
//    Route::post('comentaries', 'ComentaryController@store');
//    Route::put('comentaries/{comentary}', 'ComentaryController@update');
//    Route::delete('comentaries/{comentary}', 'ComentaryController@delete');
    
    Route::get('articles/{article}/comentary', 'ComentaryController@index');
    Route::get('articles/{article}/comentary/{comentary}', 'ComentaryController@show');
    Route::post('articles/{article}/comentary', 'ComentaryController@store');
    Route::put('articles/{article}/comentary/{comentary}', 'ComentaryController@update');
    Route::delete('articles/{article}/comentary/{comentary}', 'ComentaryControllerr@delete');
});
