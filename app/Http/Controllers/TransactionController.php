<?php

namespace App\Http\Controllers;
use \App\transaksi;
use Illuminate\Http\Request;
use DB;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli=\App\pembeli::all();
        $barang=\App\barang::all();
        $transaksi=DB::table('transaksi')
        ->join('barang', 'transaksi.kd_brg', '=', 'barang.kd_brg')
        ->join('pembeli', 'transaksi.kd_pembeli', '=', 'pembeli.kd_pembeli')
        ->select('transaksi.kd_trx', 'transaksi.created_at', 'pembeli.nm_pembeli', 'pembeli.kota', 'barang.nm_brg', 'barang.merk', 'barang.harga')
        ->get();
        return view('transaction', compact('transaksi', 'pembeli', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        transaksi::create($request->all());
        return \redirect('/transaction')->with('success','<strong>Data berhasil dimasukkan!</strong> Silakan anda cek data pada tabel di bawah ini.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
