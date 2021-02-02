<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function usuarios(){
        return $this->hasMany('App\User', 'id_cargo', 'id');
    }
}
