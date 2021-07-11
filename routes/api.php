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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["middleware" => "auth.api"],function(){
    // auth.apiはKarnel.phpで定義されている。
    Route::get('/todo','TodoController@get');
    Route::post('/todo','TodoController@post');
    Route::delete('/todo/{id}','TodoController@delete');
    Route::put('/todo/{id}','TodoController@update');
});
Route::get('/','dentakusController@get');
Route::post('/','dentakusController@post');
Route::delete('/{id}','dentakusController@delete');
Route::put('/{id}','dentakusController@update');



