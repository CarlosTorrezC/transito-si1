<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titulo;
use App\Capitulo;
use App\Infraccion;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TitulosController extends Controller
{
    public function __construct(){
        $this->middleware('permission:titulos.create')->only(['create', 'store']);
        $this->middleware('permission:titulos.index')->only(['index']);
        $this->middleware('permission:titulos.edit')->only(['edit', 'update']);
        $this->middleware('permission:titulos.show')->only(['show']);
        $this->middleware('permission:titulos.destroy')->only(['destroy']);
    }

    public static $TITULO = 'TITULO';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulos = Titulo::get();

        return view('titulo.index', compact('titulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titulo.create');
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
        ]);

        $titulo = new Titulo();
        $cambio = strtoupper($request->input('nombre'));
        $titulo->nombre = $cambio;
        $titulo->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "Titulo:".$titulo->nombre;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$TITULO;
        $bita->codigo_documento = $titulo->id;
        $bita->save();

        return back()->with('success', 'Titulo Creado');
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
        $titulo = Titulo::findOrFail($id);

        return view('titulo.edit', compact('titulo'));
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
        ]);

        $titulo = Titulo::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Titulo:".$titulo->nombre;

        $cambio = strtoupper($request->input('nombre'));
        $titulo->nombre = $cambio;
        $titulo->estado = $request->has('estado')? false:true;
        $titulo->save();

        $bita->datos_nuevos = "Titulo:".$titulo->nombre;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$TITULO;
        $bita->codigo_documento = $titulo->id;
        $bita->save();

        return redirect()->route('titulos.index')->with('success', 'Titulo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulo = Titulo::findOrFail($id);
        $titulo->estado = true;
        $titulo->save();

        $capitulos = Capitulo::where('id_titulo', $titulo->id)->get();
        foreach($capitulos as $cap){
                $cap->estado = true;
                $cap->save();
                $infracciones = Infraccion::where('id_capitulo', $cap->id)->get();
                foreach($infracciones as $infra){
                    $infra->estado = true;
                    $infra->save();
                }
        }

        $bita = new Bitacora();
        $bita->datos_antiguos = "Titulo:".$titulo->nombre;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$TITULO;
        $bita->codigo_documento = $titulo->id;
        $bita->save();

        return redirect()->route('titulos.index')->with('success', 'Titulo Eliminado');
    }
}
