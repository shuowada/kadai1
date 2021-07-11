<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dentakuController extends Controller
{
public function index() {

        return view('dentaku');

    }//
}

public function getAddressByPostalCode($dentaku)
    {
        $addresses = Postalcode::where('siki', $dentaku);

        return response()->json($addresses);
    }