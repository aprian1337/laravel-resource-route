<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = \App\pembeli::all();
        return view('customer', ['pembeli' => $pembeli]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\pembeli::create($request->all());
        return \redirect('customer')->with('success','<strong>Data berhasil dimasukkan!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembeli = \App\pembeli::find($id);
        $pembeli->update($request->all());
        return \redirect('customer')->with('success','<strong>Data berhasil diubah!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = \App\pembeli::find($id);
        $pembeli->delete($pembeli);
        return \redirect('customer')->with('success','<strong>Data berhasil dihapus!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }
}
