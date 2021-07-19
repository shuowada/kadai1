<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class denController extends Controller
{
    public function indox(Request $request){
if(isset($request->id))
{
$param=['id'=> $request->id];
$items=  DB::select('select * from denn where id=:id',$param);
	}else{
$items=  DB::select('select * from denn');
		}

return view('denn.den', ['items' => $items]);
    }
 
public function post(Request $request) {
        $items =  DB::select('select * from denn');
        return view('denn.den', ['items' => $items]);    }

public function add(Request $request) {
return view('denn.add');
}


public function create(Request $request) {
        $param = [
             'id' => $request->id,
            'totyu' => $request->totyu, //取得したいデータをinput要素のname属性
            'result' => $request->result,

        ];
        //DBに接続しデータを挿入する。第１パラメータにSQL文、第２に$paramを。
        DB::insert('insert into denn (id,siki,goukei) values (:id,:totyu,:result)', $param);

//トップページに遷移する
        return redirect('/den');
    }

public function edit(Request $request) {
$param=['id'=> $request->id];
$item=  DB::select('select * from denn where id=:id',$param);
	
return view('denn.add', ['form' => $item[0]]);
		}


public function update(Request $request) {
        $param = [
             'id' => $request->id,
            'totyu' => $request->totyu, //取得したいデータをinput要素のname属性
            'result' => $request->result,
];
        //DBに接続しデータを挿入する。第１パラメータにSQL文、第２に$paramを。
        DB::update('update denn set id=:id,totyu=:siki,goukei:result where id=;id', $param);

//トップページに遷移する
        return redirect('/den');
    }

public function del(Request $request) {
$param=['id'=> $request->id];
$item=  DB::select('select * from denn where id=:id',$param);
	
return view('denn.del', ['form' => $item[0]]);
		}

public function remove(Request $request) {
$param=['id'=> $request->id];
 DB::delete('delete * from denn where id=:id',$param);
	
return redirect('/den');
		}


}