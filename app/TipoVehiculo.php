<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    protected $table = 'tipo_vehiculos';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function vehiculos(){
        return $this->hasMany('App\Vehiculo', 'id_tipovehiculo', 'id');
    }
}
