<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInputController extends Controller
{
    public function saveData(Request $request)
    {
        DB::table('user_input')->updateOrInsert(
            [
                'user_id' => $request->input('user_id')
            ],
            [
                $request->input('key') => $request->input('value')
            ]
        );
    }

    public function loadData(Request $request)
    {
        $user_id = $request->input('user_id');
        $data = [
            'result' => DB::table('user_input')->where('user_id', $user_id)->first()
        ];
        return $data;
    }
}