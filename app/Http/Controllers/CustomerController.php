<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function insert(Request $request){
        \App\pembeli::create($request->all());
        return \redirect('customer')->with('insertData','<strong>Data berhasil dimasukkan!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }
}
