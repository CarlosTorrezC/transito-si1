<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capitulo;
use App\Titulo;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CapitulosController extends Controller
{
    public function __construct(){
        $this->middleware('permission:capitulos.create')->only(['create', 'store']);
        $this->middleware('permission:capitulos.index')->only(['index']);
        $this->middleware('permission:capitulos.edit')->only(['edit', 'update']);
        $this->middleware('permission:capitulos.show')->only(['show']);
        $this->middleware('permission:capitulos.destroy')->only(['destroy']);
    }

    public static $CAPITULO = 'CAPITULO';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capitulos = Capitulo::get();
        $titulos = Titulo::get();

        return view('capitulo.index', compact('capitulos', 'titulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulos = Titulo::where('estado', false)->pluck('nombre', 'id');

        return view('capitulo.create', compact('titulos'));
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
            'nombre' => 'required',
            'id_titulo' => 'required',
        ]);

        $capitulo = new Capitulo();
        $cambio = strtoupper($request->input('nombre'));
        $capitulo->nombre = $cambio;
        $capitulo->id_titulo = $request->input('id_titulo');
        $capitulo->save();

        $titulo = Titulo::findOrFail($capitulo->id_titulo);

        $bita = new Bitacora();
        $bita->datos_nuevos = "Nombre:".$capitulo->nombre." | Marca:".$titulo->nombre;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$CAPITULO;
        $bita->codigo_documento = $capitulo->id;
        $bita->save();

        return redirect()->route('capitulos.index')->with('success', 'Capitulo Creado');
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
        $capitulo = Capitulo::findOrFail($id);
        $titulos = Titulo::where('estado', false)->pluck('nombre', 'id');
        $tituloA = Titulo::findOrFail($capitulo->id_titulo);

        return view('capitulo.edit', compact('capitulo', 'titulos', 'tituloA'));
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
            'nombre' => 'required',
            'id_titulo' => 'required',
        ]);

        $capitulo = Capitulo::findOrFail($id);

        $titulo = Titulo::findOrFail($capitulo->id_titulo);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombre:".$capitulo->nombre." | Titulo:".$titulo->nombre;

        $cambio = strtoupper($request->input('nombre'));
        $capitulo->nombre = $cambio;
        $capitulo->id_titulo = $request->input('id_titulo');
        $capitulo->estado = $request->has('estado')? false : true;
        $capitulo->save();

        $bita->datos_nuevos = "Nombre:".$capitulo->nombre." | Titulo:".$titulo->nombre;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$CAPITULO;
        $bita->codigo_documento = $capitulo->id;
        $bita->save();

        return redirect()->route('capitulos.index')->with('success', 'Capitulo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capitulo = Capitulo::findOrFail($id);
        $capitulo->estado = true;
        $capitulo->save();

        $infracciones = Infraccion::where('id_capitulo', $capitulo->id)->get();
        foreach($infracciones as $infra){
            $infra->estado = true;
            $infra->save();
        }

        $titulo = Titulo::findOrFail($capitulo->id_titulo);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombre:".$capitulo->nombre." | Titulo:".$titulo->nombre;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$CAPITULO;
        $bita->codigo_documento = $capitulo->id;
        $bita->save();

        return redirect()->route('capitulos.index')->with('success', 'Capitulo Eliminado');
    }
}
