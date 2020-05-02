<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function customer(){
        $pembeli = \App\pembeli::all();
        return view('customer', ['pembeli' => $pembeli]);
    }

    public function insert($id){
        if($id=="pembeli"){
            return view('aww');
        }
    }
}
