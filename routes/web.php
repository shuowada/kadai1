<?php
use Illuminate\Support\Facades\Route;

use vendor\laravel\framework\src\Illuminate\Routing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('den', 'denController@indox');
Route::get('denn/den', 'denController@indox');

//Route::post('den', 'denController@post');

Route::get('denn/edit','denController@edit');
Route::post('denn/edit','denController@update');

Route::get('denn/del','denController@del');
Route::post('denn/del','denController@remove');


Route::get('denn/add','denController@add');
Route::post('denn/add','denController@create');

Route::get('denn.add','denController@add');
Route::post('denn.add','denController@create');






//Route::get('a', 'denController@index');





//Route::get('b', 'dentakuTestController@inputDentakutest');
//Route::get('ajax/dentaku', 'Ajax\dentakuController@index');
//Route::get('dentakutestresult', 'denController@post');
//Route::post('dentakutestresult', 'denController@create');
//Route::get('dentaku', 'ddentakuController@index');

//Route::get('/postal-code/{postal-code}/address', 'dentakuController@getAddressByPostalCode'); 

Route::resource('users', 'UsersController');
//Route::post('users/{id}', 'UsersController@destroy');

//Auth::routes();

///Route::group(["middleware"=>"auth"],function(){
 //   Route::get('/todo',TodoController::class . "@index");
//});

// 入力画面
//Route::get('/dentakutest', function () {
//    return view('input');
//});

// 入力確認画面
//Route::get('confirm', 'dentakuTestController@inputConfirm');



Route::get('inputForm', 'postTestController@inputForm'); // 入力フォーム画面(inputForm)のURL割当、起動コントローラ・関数指定
Route::post('formPost', 'postTestController@formPost');//結果画面(resultPage)のURL割当、起動コントローラ・関数指定


//Route::get('dentakutest', 'postTestdentakuController@dentakutest'); // 入力フォーム画面(inputForm)のURL割当、起動コントローラ・関数指定
//Route::post('formPost', 'postTestdentakuController@formPost');

Route::post('/post', 'PostsController@store');

Route::get('inputDentakutest', 'dentakuTestController@inputDentakutest'); // 入力フォーム画面(inputForm)のURL割当、起動コントローラ・関数指定
Route::post('dentakutestresult', 'dentakuTestController@dentakutestresult');


Route::post('/saveData', 'UserInputController@saveData');
Route::post('/loadData', 'UserInputController@loadData');