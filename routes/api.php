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


Route::get('comentaries', 'ComentaryController@index');
Route::get('comentaries/{comentary}', 'ComentaryController@show');
Route::post('comentaries', 'ComentaryController@store');
Route::put('comentaries/{comentary}', 'ComentaryController@update');
Route::delete('comentaries/{comentary}', 'ComentaryController@delete');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('articles/{article}', 'ArticleController@show');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{article}', 'ArticleController@update');
    Route::delete('articles/{article}', 'ArticleController@delete');




});


