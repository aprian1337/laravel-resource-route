<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembeli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PEMBELI', function (Blueprint $table) {
            $table->increments('kd_pembeli');
            $table->string('nm_pembeli', 30);
            $table->string('jenis_kelamin', 2);
            $table->text('alamat');
            $table->string('kota', 20);
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
        Schema::dropIfExists('pembeli');
    }
}
