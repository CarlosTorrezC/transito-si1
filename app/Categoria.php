<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $incrementing = false;
    public $primaryKey = 'categoria';
    public $timestamps = false;
    protected $keyType = 'char';

    public function licenciaA(){
        return $this->hasMany('App\LicenciaA', 'categoria_licencia', 'categoria');
    }
}
