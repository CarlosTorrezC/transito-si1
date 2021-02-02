<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenciaM extends Model
{
    protected $table = 'licencia_m_s';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function persona(){
        return $this->belongsTo('App\Persona');
    }
}
