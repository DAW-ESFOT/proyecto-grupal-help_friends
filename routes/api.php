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
Route::get('images','ImageController@index');
Route::get('articles/{article}/comments', 'CommentController@index');


//OJO
Route::get('users', 'UserController@index');

Route::group(['middleware' => ['jwt.verify']], function() {


    Route::get('articles/{article}', 'ArticleController@show');
    Route::get('user', 'UserController@getAuthenticatedUser');
//    Route::get('articles/{article}/image', 'UserController@image');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{article}', 'ArticleController@update');
    Route::delete('articles/{article}', 'ArticleController@delete');

    //Apuntar al controlador articles para manejar el status
    Route::put('articles/{article}/status', 'ArticleController@updateStatus');
    Route::put('articles/{article}/final_comment', 'ArticleController@setFinalComment');

    //IMAGES
    Route::get('articles/{article}/images','ImageController@bounch');
    Route::get('articles/{article}/images/{image}','ImageController@show');
    Route::post('articles/{article}/images','ImageController@store');
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


    //COMMENTS
    Route::get('articles/{article}/comments/{comment}', 'CommentController@show');
    Route::post('articles/{article}/comments', 'CommentController@store');
    Route::put('articles/{article}/comments/{comment}', 'CommentController@update');
    Route::delete('articles/{article}/comments/{comment}', 'ComentaryControllerr@delete');
});
