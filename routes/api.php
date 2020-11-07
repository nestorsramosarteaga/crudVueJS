<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('posts', 'PostController@index');
Route::group(['prefix' => 'post'], function () {
    Route::post('add', 'PostController@store');
    Route::get('edit/{post}', 'PostController@show');
    Route::post('update/{post}', 'PostController@update');
    Route::delete('delete/{post}', 'PostController@destroy');
});

Route::get('configs', 'ConfigController@index');

Route::group(['prefix' => 'config'], function(){
    Route::post('add', 'ConfigController@store');
    Route::get('edit/{config}', 'ConfigController@show');
    Route::post('update/{config}', 'ConfigController@update');
    Route::delete('delete/{config}', 'ConfigController@destroy');
});