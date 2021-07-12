<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dentakuController extends Controller
{
public function index() {

        return view('dentaku');

    }//


 public function post(Request $request) {
        $data = [
            'siki'=>'name',
            'goukei'=>'result',
        ];
        return view('dentakutestresult', $data); //viewsフォルダのpostファイルに$dataを渡しつつページ表示する
    }


public function create(Request $request) {
        $param = [
            'result' => $request->result, //取得したいデータをinput要素のname属性
            'totyu' => $request->totyu,

        ];
        //DBに接続しデータを挿入する。第１パラメータにSQL文、第２に$paramを。
        DB::insert('insert into reviews (goukei, siki) values (:result,totyu)', $param);
        //トップページに遷移する
        return redirect('/');
    }




}


