<?php

namespace App\Http\Controllers;

use App\dentakus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dentakusController extends Controller
{
  public function index() {
        return view('dentaku');
    }
    
}
