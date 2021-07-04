<?php
use App\Http\Controllers\dentakuTestController;
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
    return view('welcome');});

//Route::get('/{any}', function() {
//       return view('app');})->where('any', '.*');


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



Route::get('inputDentakutest', 'dentakuTestController@inputDentakutest'); // 入力フォーム画面(inputForm)のURL割当、起動コントローラ・関数指定
Route::post('dentakutestresult', 'dentakuTestController@dentakutestresult');