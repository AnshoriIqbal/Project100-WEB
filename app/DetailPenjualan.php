<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    //
    protected $table='detail_penjualan';
    protected $primaryKey='id_detailpenjualan';
    protected $fillable=['id_obat','id_penjualan','jumlah','total','harga'];

}
