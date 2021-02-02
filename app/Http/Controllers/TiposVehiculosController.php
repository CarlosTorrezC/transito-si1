<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoVehiculo;
use Carbon\Carbon;
use App\Bitacora;
use Illuminate\Support\Facades\Auth;

class TiposVehiculosController extends Controller
{
    public function __construct(){
        $this->middleware('permission:tiposvehiculos.create')->only(['create', 'store']);
        $this->middleware('permission:tiposvehiculos.index')->only(['index']);
        $this->middleware('permission:tiposvehiculos.edit')->only(['edit', 'update']);
        $this->middleware('permission:tiposvehiculos.show')->only(['show']);
        $this->middleware('permission:tiposvehiculos.destroy')->only(['destroy']);
    }

    public static $TIPO_VEHICULO = 'TIPO VEHICULO';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoV = TipoVehiculo::paginate(12);
        return view('tiposvehiculos.index')->with('tipoV', $tipoV);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposvehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required'
        ]);

        $TV = new TipoVehiculo();
        $TV->descripcion = $request->input('descripcion');
        $TV->save();

            $bita = new Bitacora();
            $bita->datos_nuevos = "Descripcion:".$TV->descripcion;
            $bita->fecha_hora = Carbon::now()->toDateTimeString();
            $bita->id_usuario = Auth::user()->id;
            $bita->ip = request()->ip();
            $bita->id_operacion = Bitacora::OP_CREATE();
            $bita->modulo = self::$TIPO_VEHICULO;
            $bita->codigo_documento = $TV->id;
            $bita->save();

        return redirect()->route('tiposvehiculos.index')->with('success', 'Tipo Vehicular Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoV = TipoVehiculo::findOrFail($id);
        return view('tiposvehiculos.edit')->with('tipoV', $tipoV);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descripcion' => 'required'
        ]);

        $tipoV = TipoVehiculo::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Descripcion:".$tipoV->descripcion;

        $tipoV->descripcion = $request->input('descripcion');
        $tipoV->estado = $request->has('estado')? false:true;
        $tipoV->save();

            $bita->datos_nuevos = "Descripcion:".$tipoV->descripcion;
            $bita->fecha_hora = Carbon::now()->toDateTimeString();
            $bita->id_usuario = Auth::user()->id;
            $bita->ip = request()->ip();
            $bita->id_operacion = Bitacora::OP_EDIT();
            $bita->modulo = self::$TIPO_VEHICULO;
            $bita->codigo_documento = $tipoV->id;
            $bita->save(); 

        return redirect()->route('tiposvehiculos.index')->with('success', 'Tipo Vehicular Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoV = TipoVehiculo::findOrFail($id);
        $tipoV->estado = true;
        $tipoV->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Descripcion:".$tipoV->descripcion;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$TIPO_VEHICULO;
        $bita->codigo_documento = $tipoV->id;
        $bita->save();       

        return redirect()->route('tiposvehiculos.index')->with('success', 'Tipo Vehicular Eliminado');
    }
}
