<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kd_trx';
    protected $fillable = ['kd_brg', 'kd_pembeli'];
}
