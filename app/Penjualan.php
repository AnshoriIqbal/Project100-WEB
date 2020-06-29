<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $table='penjualan';
    protected $primaryKey='id_penjualan';
    protected $fillable=['tanggalPenjualan','id_karyawan','id_pelanggan','hargatotal','cash','kembalian','status'];
}

