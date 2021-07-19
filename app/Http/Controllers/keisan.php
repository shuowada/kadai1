<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class keisan extends Controller
{
    public function post(Request $request) {
                $data = [
            'siki'=>'name',
            'goukei'=>'result',
        ];
        return view('inputDentakutest', $data);
}
}
