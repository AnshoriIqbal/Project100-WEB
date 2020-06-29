<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //
    protected $table='supply';
    protected $primaryKey='id_supply';
    protected $fillable=['quantity','hargatotal','tanggalOrder','tanggalPenerimaan','tanggalBayar','id_karyawan','id_supplier','id_obat'];
}

