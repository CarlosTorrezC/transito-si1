<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operacions';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function bitacoras(){
        return $this->hasMany('App\Bitacora', 'id_operacion', 'id');
    }
}
