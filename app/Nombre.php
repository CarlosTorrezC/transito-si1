<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nombre extends Model
{
    protected $table = 'nombres';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function marca(){
        return $this->belongsTo('App\Marca');
    }
}
