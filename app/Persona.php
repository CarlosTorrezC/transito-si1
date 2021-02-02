<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    public $incrementing = false;
    public $primaryKey = 'ci';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function telefonos(){
        return $this->hasMany('App\Telefono', 'ci_persona', 'ci');
    }
    public function licenciaT(){
        return $this->hasMany('App\LicenciaT', 'ci_persona', 'ci');
    }
    public function licenciaM(){
        return $this->hasMany('App\LicenciaM', 'ci_persona', 'ci');
    }
    public function licenciaA(){
        return $this->hasMany('App\LicenciaA', 'ci_persona', 'ci');
    }
    public function vehiculos(){
        return $this->hasMany('App\Vehiculo', 'ci_persona', 'ci');
    }
}
