<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguros';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo');
    }
}
