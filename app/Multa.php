<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multas';
    public $timestamps = false;
    protected $keyType = 'integer';

    public static  $AUTH_ID = 'ACde3ee253e83b63d5470d16d0ff75b795';
    public static  $AUTH_TOKEN = '4f02cf7de34364b65cbd5672eac0967f';

    public function detalleMulta(){
        return $this->hasMany('App\DetalleMulta', 'id_multa', 'id');
    }
    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo');
    }
}
