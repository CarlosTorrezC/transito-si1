<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    public $incrementing = false;
    public $primaryKey = 'placa';
    protected $keyType = 'string';

    public function tipoVehiculo(){
        return $this->belongsTo('App\TipoVehiculo');
    }
    public function color(){
        return $this->belongsTo('App\Color');
    }
    public function seguros(){
        return $this->hasMany('App\Seguro', 'placa_vehiculo', 'placa');
    }
    public function historiales(){
        return $this->hasMany('App\Historial', 'placa_vehiculo', 'placa');
    }
    public function ciudadano(){
        return $this->belongsTo('App\Persona');
    }
    public function multas(){
        return $this->hasMany('App\Multa', 'placa_vehiculo', 'placa');
    }
}
