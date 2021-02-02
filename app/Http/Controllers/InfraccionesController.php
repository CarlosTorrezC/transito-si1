<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infraccion;
use App\Bitacora;
use Carbon\Carbon;
use App\Capitulo;
use Illuminate\Support\Facades\Auth;

class InfraccionesController extends Controller
{
    public function __construct(){
        $this->middleware('permission:infraccion.create')->only(['create', 'store']);
        $this->middleware('permission:infraccion.index')->only(['index']);
        $this->middleware('permission:infraccion.edit')->only(['edit', 'update']);
        $this->middleware('permission:infraccion.show')->only(['show']);
        $this->middleware('permission:infraccion.destroy')->only(['destroy']);
    }

    public static $INFRACCION_S = 'INFRACCION';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infra = Infraccion::get();
        $capitulos = Capitulo::get();

        return view('infraccion.index', compact('infra', 'capitulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulos = Capitulo::where('estado', false)->pluck('nombre', 'id');

        return view('infraccion.create', compact('capitulos'));
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
            'codigo' => 'required|unique:infraccions,id',
            'monto' => 'required|gt:0|numeric',
            'descripcion' => 'required',
        ]);

        $infra = new Infraccion();
        $infra->id = $request->input('codigo');
        $infra->monto = $request->input('monto');
        $cambio = strtoupper($request->input('descripcion'));
        $infra->descripcion = $cambio;
        $infra->id_capitulo = $request->input('id_capitulo');
        $infra->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "Descripcion:".$infra->descripcion." | Monto:".$infra->monto;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$INFRACCION_S;
        $bita->codigo_documento = $infra->id;
        $bita->save();

        return redirect()->route('infraccion.index')->with('success', 'Infraccion Creada');
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
        $infra = Infraccion::findOrFail($id);
        $capitulos = Capitulo::pluck('nombre', 'id');
        $capituloA = Capitulo::findOrFail($infra->id_capitulo);

        return view('infraccion.edit', compact('infra', 'capitulos', 'capituloA'));
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
            'monto' => 'required|gt:0|numeric',
            'descripcion' => 'required',
        ]);

        $infra = Infraccion::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Descripcion:".$infra->descripcion." | Monto:".$infra->monto;

        $infra->monto = $request->input('monto');
        $cambio = strtoupper($request->input('descripcion'));
        $infra->descripcion = $cambio;
        $infra->estado = $request->has('estado')? false: true;
        $infra->save();

        $bita->datos_nuevos = "Descripcion:".$infra->descripcion." | Monto:".$infra->monto;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$INFRACCION_S;
        $bita->codigo_documento = $infra->id;
        $bita->save();

        return redirect()->route('infraccion.index')->with('success', 'Infraccion Editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infra = Infraccion::findOrFail($id);
        $infra->estado = true;
        $infra->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Descripcion:".$infra->descripcion." | Monto:".$infra->monto;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$INFRACCION_S;
        $bita->codigo_documento = $infra->id;
        $bita->save();

        return redirect()->route('infraccion.index')->with('success', 'Infraccion Eliminada');
    }
}
