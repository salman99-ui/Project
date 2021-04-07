<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
    //

    public function index(){
        return view('main');
    }

    public function stock(){
        return view('stock');
    }
}
