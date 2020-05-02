<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function customer(){
        $pembeli = \App\pembeli::all();
        // $pembeli = DB::table('pembeli')->paginate(10);
        return view('customer', ['pembeli' => $pembeli]);
    }

    public function insert($id){
        if($id=="pembeli"){
            return view('aww');
        }
    }
}
