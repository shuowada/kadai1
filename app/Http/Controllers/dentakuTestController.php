<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class dentakuTestController extends Controller
{

public function index(Request $request)
{
$items=  DB::select('select * from den');
		}

return view('dentakuTest.index', ['items' => $items]);

}
    
/*
{
if(isset($request->id))
{
$param=['id'=> $request->id];
$items=  DB::select('select * from den where id=:id',$param);
	}else{
$items=  DB::select('select * from den');
		}

return view('dentakuTest.index', ['items' => $items]);
}
*/


public function indox(){


        $items = DB::select('select * from den');
        return view('den',['items' => $items]);
    }





