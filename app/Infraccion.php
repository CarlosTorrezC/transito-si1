<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    protected $table = 'infraccions';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function detalleMulta(){
        return $this->hasMany('App\DetalleMulta', 'id_infraccion', 'id');
    }
    public function capitulo(){
        return $this->belongsTo('App\Capitulo');
    }
}
