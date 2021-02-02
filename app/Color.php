<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function vehiculos(){
        return $this->hasMany('App\Vehiculo', 'id_color', 'id');
    }
}
