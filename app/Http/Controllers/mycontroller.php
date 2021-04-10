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

    public function login(){
        return view('login');
    }

    public function update(){
        return view('update');
    }

    public function addtransaction(){
        return view('addtransaction');
    }

    public function updatetransaction(){
        return view('updatetransaction');
    }
}
