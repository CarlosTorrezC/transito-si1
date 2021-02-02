<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;
use Carbon\Carbon;
use App\Bitacora;
use App\Historial;
use App\Vehiculo;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function __construct(){
        $this->middleware('permission:reporte.create')->only(['create', 'store']);
        $this->middleware('permission:reporte.index')->only(['index']);
        $this->middleware('permission:reporte.edit')->only(['edit', 'update']);
        $this->middleware('permission:reporte.show')->only(['show']);
        $this->middleware('permission:reporte.destroy')->only(['destroy']);
    }

    public static $REPORTE_S = 'REPORTE';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportes = Reporte::get();
        return view('reporte.index')->with('reportes', $reportes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reporte.create');
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
            'ci_persona' => 'required|digits_between:6,10|numeric',
            'descripcion' => 'required',
        ]);
        
        if(Vehiculo::where('placa', $request->input('placa_vehiculo'))
                                ->where('estado', true)
                                ->exists()){
            return back()->with('error', 'Placa del Vehiculo Inactiva');
        }

        $time = Carbon::now()->toDateTimeString();

        $report = new Reporte();
        $report->fecha_hora = Carbon::now();
        $cambio = strtoupper($request->input('placa_vehiculo'));
        $report->placa_vehiculo = $cambio;
        $cambio = strtoupper($request->input('descripcion'));
        $report->descripcion = $cambio;
        $report->ci_persona = $request->input('ci_persona');
        $report->save();

        //Historial
        $histo = new Historial();
        $histo->fecha_hora = $time;
        $histo->descripcion = "Identificacion del documento Reporte ".$report->id." Reportado por el ciudadano:".$report->ci_persona;
        $histo->placa_vehiculo = $report->placa_vehiculo;
        $histo->save();

        //Bitacora
        $bita = new Bitacora();
        $bita->datos_nuevos = "CI Reporta:".$report->ci_persona." | Placa Vehiculo:".$report->placa_vehiculo." | Descripcion:".$report->descripcion;
        $bita->fecha_hora = $time;
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$REPORTE_S;
        $bita->codigo_documento = $report->id;
        $bita->save();

        return redirect()->route('reporte.index')->with('success', 'Reporte Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Reporte::findOrFail($id);

        return view('reporte.show')->with('report', $report);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->estado = true;
        $reporte->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Reporta:".$reporte->ci_persona." | Placa Vehiculo:".$reporte->placa_vehiculo." | Descripcion:".$reporte->descripcion;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$REPORTE_S;
        $bita->codigo_documento = $reporte->id;
        $bita->save();

        return redirect()->route('reporte.index')->with('success', 'Reporte Eliminado');
    }
}
