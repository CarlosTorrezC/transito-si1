<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
use Yajra\Datatables\Datatables;
use DB;

class BitacorasController extends Controller
{
    public function __construct(){
        $this->middleware('permission:bitacora.index')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                   
            $bitacora = DB::table('bitacoras')
                        ->join('users', 'bitacoras.id_usuario', '=', 'users.id')
                        ->join('operacions', 'bitacoras.id_operacion', '=', 'operacions.id')
                        ->orderBy('bitacoras.id', 'asc')
                        ->select('users.username', 'bitacoras.ip', 'bitacoras.fecha_hora', 
                                'bitacoras.datos_antiguos', 'bitacoras.datos_nuevos', 'operacions.operacion', 
                                'bitacoras.modulo', 'bitacoras.codigo_documento')
                        //->paginate(10);
                        ->get();
        

        return view('bitacora.index', compact('bitacora'));
    }

}
