<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    protected $table = 'pembeli';
    protected $fillable = ['nm_pembeli', 'jenis_kelamin', 'alamat', 'kota'];
    protected $primaryKey = 'kd_pembeli';
}
