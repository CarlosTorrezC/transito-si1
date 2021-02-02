<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMulta extends Model
{
    protected $table = 'detalle_multas';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function multa(){
        return $this->belongsTo('App\Multa');
    }
    public function infraccion(){
        return $this->belongsTo('App\Infraccion');
    }
}
