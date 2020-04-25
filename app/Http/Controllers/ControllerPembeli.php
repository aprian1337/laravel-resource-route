<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPembeli extends Controller
{
    public function index(){
        $pembeli = \App\pembeli::all();
        return view('pembeli', ['pembeli' => $pembeli]);
    }
}
