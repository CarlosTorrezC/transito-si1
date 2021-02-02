<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial;
use Carbon\Carbon;
use App\Bitacora;
use Illuminate\Support\Facades\Auth;

class HistorialesController extends Controller
{
    public function __construct(){
        $this->middleware('permission:historial.create')->only(['create', 'store']);
        $this->middleware('permission:historial.index')->only(['index']);
        $this->middleware('permission:historial.edit')->only(['edit', 'update']);
        $this->middleware('permission:historial.show')->only(['show']);
        $this->middleware('permission:historial.destroy')->only(['destroy']);
    }

    public static $HISTORIAL_S = 'HISTORIAL';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::orderBy('id', 'asc')
                                ->paginate(10);

        return view('historial.index')->with('historiales', $historiales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('historial.create');
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
            'placa_vehiculo' => 'required|exists:vehiculos,placa',
            'descripcion' => 'required',
        ]);

        $histo = new Historial();
        $histo->fecha_hora = Carbon::now()->toDateTimeString();
        $cambio = strtoupper($request->input('placa_vehiculo'));
        $histo->placa_vehiculo = $cambio;
        $cambio = strtoupper($request->input('descripcion'));
        $histo->descripcion = $cambio;
        $histo->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "Descripcion:".$histo->descripcion." | Apellidos:".$histo->placa_vehiculo;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$HISTORIAL_S;
        $bita->codigo_documento = $histo->id;
        $bita->save();

        return redirect()->route('historial.index')->with('success', 'Historial Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial = Historial::findOrFail($id);

        return view('historial.show')->with('historial', $historial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $histo = Historial::findOrFail($id);
        $histo->estado = true;
        $histo->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Descripcion:".$histo->descripcion." | Apellidos:".$histo->placa_vehiculo;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$HISTORIAL_S;
        $bita->codigo_documento = $histo->id;
        $bita->save();

        return redirect()->route('historial.index')->with('success', 'Historial Eliminado');
    }
}
