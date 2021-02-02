<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{

    protected $table = 'telefonos';
    public $incrementing = false;
    public $primaryKey = 'numero';
    public $timestamps = false;
    protected $keyType = 'integer';

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}
