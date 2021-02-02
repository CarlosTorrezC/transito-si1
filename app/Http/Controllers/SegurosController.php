<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seguro;
use App\Vehiculo;
use Carbon\Carbon;
use App\Bitacora;
use Illuminate\Support\Facades\Auth;

class SegurosController extends Controller
{

    public function __construct(){
        $this->middleware('permission:seguro.create')->only(['create', 'store']);
        $this->middleware('permission:seguro.index')->only(['index']);
        $this->middleware('permission:seguro.edit')->only(['edit', 'update']);
        $this->middleware('permission:seguro.show')->only(['show']);
        $this->middleware('permission:seguro.destroy')->only(['destroy']);
    }

    public static $SEGURO_S = 'SEGURO';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguros = Seguro::get();

        return view('seguro.index')->with('seguros', $seguros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguro.create');
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
            'empresa' => 'required',
            'emision' => 'required',
            //'vencimiento' => 'required',
        ]);

        /*$emision = $request->input('emision');
        $vencimiento = $request->input('vencimiento');
        $to = \Carbon\Carbon::parse($vencimiento);
        $from = \Carbon\Carbon::parse($emision);
        $diff = $to->diffInDays($from);
        //dd($diff);
        if($diff >= 356){
            $seg = new Seguro();
            $seg->emision = $request->input('emision');
            $seg->vencimiento = $request->input('vencimiento');
            $cambio = strtoupper($request->input('placa_vehiculo'));
            $seg->placa_vehiculo = $cambio;
            $cambio = strtoupper($request->input('empresa'));
            $seg->empresa = $cambio;
            $seg->save();

            $bita = new Bitacora();
            $bita->datos_nuevos = "Empresa:".$seg->empresa." | Placa Vehiculo:".$seg->placa_vehiculo." | Emision:".$seg->emision." | Vencimiento:".$seg->vencimiento;
            $bita->fecha_hora = Carbon::now()->toDateTimeString();
            $bita->id_usuario = Auth::user()->id;
            $bita->ip = request()->ip();
            $bita->id_operacion = Bitacora::OP_CREATE();
            $bita->modulo = self::$SEGURO_S;
            $bita->codigo_documento = $seg->id;
            $bita->save();

            return redirect()->route('seguro.index')->with('success', 'Seguro Creado');
        }else{
            return back()->with('error', 'Existe deficiencia en las fechas');
        }*/

        if(Vehiculo::where('placa', $request->input('placa_vehiculo'))
                                ->where('estado', true)
                                ->exists()){
            return back()->with('error', 'Placa del Vehiculo Inactiva');
        }

        $emision = $request->input('emision');
        $from = \Carbon\Carbon::parse($emision);
        $vencimiento = $from->addYears(1);

            $seg = new Seguro();
            $seg->emision = $request->input('emision');
            $seg->vencimiento = $vencimiento;
            $cambio = strtoupper($request->input('placa_vehiculo'));
            $seg->placa_vehiculo = $cambio;
            $cambio = strtoupper($request->input('empresa'));
            $seg->empresa = $cambio;
            $seg->save();

            $bita = new Bitacora();
            $bita->datos_nuevos = "Empresa:".$seg->empresa." | Placa Vehiculo:".$seg->placa_vehiculo." | Emision:".$seg->emision." | Vencimiento:".$seg->vencimiento;
            $bita->fecha_hora = Carbon::now()->toDateTimeString();
            $bita->id_usuario = Auth::user()->id;
            $bita->ip = request()->ip();
            $bita->id_operacion = Bitacora::OP_CREATE();
            $bita->modulo = self::$SEGURO_S;
            $bita->codigo_documento = $seg->id;
            $bita->save();

            return redirect()->route('seguro.show', $seg->id)->with('success', 'Seguro Creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguros = Seguro::findOrFail($id);

        return view('seguro.show', compact('seguros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seguros = Seguro::findOrFail($id);

        return view('seguro.edit', compact('seguros'));
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
            'empresa' => 'required',
        ]);


            $seg = Seguro::findOrFail($id);

            $bita = new Bitacora();
            $bita->datos_antiguos = "Empresa:".$seg->empresa." | Placa Vehiculo:".$seg->placa_vehiculo." | Emision:".$seg->emision." | Vencimiento:".$seg->vencimiento;

            $emision = $request->input('emision');
            $from = \Carbon\Carbon::parse($emision);
            $vencimiento = $from->addYears(1);

            $cambio = strtoupper($request->input('empresa'));
            $seg->empresa = $cambio;
            $seg->emision = $request->input('emision');
            $seg->vencimiento = $vencimiento;
            $seg->estado = $request->has('estado')? false:true;
            $seg->save();

            $bita->datos_nuevos = "Empresa:".$seg->empresa." | Placa Vehiculo:".$seg->placa_vehiculo." | Emision:".$seg->emision." | Vencimiento:".$seg->vencimiento;
            $bita->fecha_hora = Carbon::now()->toDateTimeString();
            $bita->id_usuario = Auth::user()->id;
            $bita->ip = request()->ip();
            $bita->id_operacion = Bitacora::OP_EDIT();
            $bita->modulo = self::$SEGURO_S;
            $bita->codigo_documento = $seg->id;
            $bita->save(); 

            return redirect()->route('seguro.show', $id)->with('success', 'Seguro Creado');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seguros = Seguro::findOrFail($id);
        $seguros->estado = true;
        $seguros->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Empresa:".$seguros->empresa." | Placa Vehiculo:".$seguros->placa_vehiculo." | Emision:".$seguros->emision." | Vencimiento:".$seguros->vencimiento;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$SEGURO_S;
        $bita->codigo_documento = $seguros->id;
        $bita->save();

        return redirect()->route('seguro.index')->with('success', 'Seguro Eliminado');
    }
}
