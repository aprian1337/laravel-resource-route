<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TRANSAKSI', function (Blueprint $table) {
            $table->increments('kd_trx');
            $table->integer('kd_brg')->unsigned();
            $table->foreign('kd_brg')->references('kd_brg')->on('barang')->onDelete('cascade');
            $table->integer('kd_pembeli')->unsigned();
            $table->foreign('kd_pembeli')->references('KD_PEMBELI')->on('pembeli')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
