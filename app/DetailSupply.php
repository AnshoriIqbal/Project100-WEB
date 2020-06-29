<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSupply extends Model
{
    //
    protected $table='detail_supply';
    protected $primaryKey='Id_detailsupply';
    protected $fillable=['id_supply','id_obat','id_detailpenjualan'];
}
