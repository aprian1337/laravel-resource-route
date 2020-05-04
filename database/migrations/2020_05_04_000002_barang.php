<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BARANG', function (Blueprint $table) {
            $table->increments('kd_brg');
            $table->string('nm_brg', 30);
            $table->string('merk', 20);
            $table->string('type', 20);
            $table->string('harga', 15);
            $table->string('stok', 10);
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
        Schema::dropIfExists('barang');
    }
}
