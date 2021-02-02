<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenciaT extends Model
{
    protected $table = 'licencia_t_s';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function persona(){
        return $this->belongsTo('App\Persona');
    }
}
