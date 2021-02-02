<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $keyType = 'integer';
    public $timestamps = false;

    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo');
    }
}
