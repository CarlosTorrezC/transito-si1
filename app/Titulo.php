<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $table = 'titulos';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function capitulos(){
        return $this->hasMany('App\Capitulo');
    }
}
