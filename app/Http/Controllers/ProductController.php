<?php

namespace App\Http\Controllers;
use \App\barang;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = barang::all();
        return view('product')->with('product', $product);
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
        $product = barang::create($request->all());
        return \redirect('product')->with('success','<strong>Data berhasil dimasukkan!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product =  barang::find($id);
        $product->update($request->all());
        return \redirect('/product')->with('success','<strong>Data berhasil diubah!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = barang::find($id);
        $product -> delete();
        return \redirect('customer')->with('success','<strong>Data berhasil dihapus!</strong> Silakan anda cek data pada tabel di bawah ini.');
    }
}
