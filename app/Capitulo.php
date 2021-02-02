<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    protected $table = 'capitulos';
    public $timestamps = false;
    protected $keyType = 'integer';
 
    public function infracciones(){
        return $this->hasMany('App\Infraccion');
    }
    public function titulo(){
        return $this->belongsTo('App\Titulo');
    }
}
