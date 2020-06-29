<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    //
    protected $table='pengembalian';
    protected $primaryKey='id_pengembalian';
    protected $fillable=['id_karyawan','tanggalPengembalian'];
}
