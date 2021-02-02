<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historials';
    protected $keyType = 'integer';
    public $timestamps = false;

    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo');
    }
}
