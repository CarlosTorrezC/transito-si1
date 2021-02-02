<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';
    public $timestamps = false;
    protected $keyType = 'integer';

    public static  $OP_CREATE = 1;
    public static  $OP_DELETE = 2;
    public static  $OP_EDIT = 3;
    public static  $OP_LOGIN = 4;
    public static  $OP_LOGOUT = 5;

    public function usuario(){
        return $this->belongsTo('App\User', 'id');
    }
    public function operacion(){
        return $this->belongsTo('App\Operacion', 'id');
    }

    public static function OP_CREATE(){
        return self::$OP_CREATE;
    }
    public static function OP_DELETE(){
        return self::$OP_DELETE;
    }
    public static function OP_EDIT(){
        return self::$OP_EDIT;
    }
    public static function OP_LOGIN(){
        return self::$OP_LOGIN;
    }
    public static function OP_LOGOUT(){
        return self::$OP_LOGOUT;
    }
}
