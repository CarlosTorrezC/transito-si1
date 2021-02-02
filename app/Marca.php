<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function nombres(){
        return $this->hasMany('App\Nombre', 'id_marca', 'id');
    }
}
