<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function termAndCondition(){
        return view('termAndCondition');
    }

}
