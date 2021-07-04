<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dentakuTestController extends Controller
{
     public function inputDentakutest()
    {
        $input_data = ['msg'=>"テキストボックスに入力してください。"];
        return view('inputDentakutest', $input_data);
    }

public function dentakutestresult(Request $request) {
 
$input_data = [
'fruits_name'=>$request->fruits_name,
            'fruits_count'=>$request->fruits_count,
            'fruits_value'=>$request->fruits_value,
            'total_value'=>$request->fruits_count * $request->fruits_value,
            'msg'=>"入力値を元に表示しています。",
'nana' =>$request->nana,
'hati' =>$request->hati,
'kyu' =>$request->kyu,
'waru' =>$request->waru,
'yon' =>$request->yon,
'go' =>$request->go,
'roku' =>$request->roku,
'kake' =>$request->kake,
'iti' =>$request->iti,
'ni' =>$request->ni,
'san' => $request->san,
'hiku' =>$request->hiku,
'zero' =>$request->zero,
'ten' =>$request->ten,
'tsu' =>$request->tsu
];

       


return view('dentakutestresult', $input_data);
   }



}
