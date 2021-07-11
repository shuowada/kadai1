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
 
}