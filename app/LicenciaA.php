<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenciaA extends Model
{
    protected $table = 'licencia_a_s';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function persona(){
        return $this->belongsTo('App\Persona');
    }
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
