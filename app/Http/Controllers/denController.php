<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class DenController extends Controller
{
    public function index(){
        $items = DB::select('select * from den');
        return view('den',['items' => $items]);
    }
 
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
        DB::insert('insert into reviews (siki,goukei) values (:totyu,result)', $param);
        //トップページに遷移する
        return redirect('/');
    }

public function func() {
  $value = 'Snome';
  $arr = ['Snome1', 'Snome2', 'Snome3'];

  return view('sample', compact('value', 'arr'));
}


}