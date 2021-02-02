<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nombre;
use App\Marca;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NombresController extends Controller
{
    public function __construct(){
        $this->middleware('permission:nombre.create')->only(['create', 'store']);
        $this->middleware('permission:nombre.index')->only(['index']);
        $this->middleware('permission:nombre.edit')->only(['edit', 'update']);
        $this->middleware('permission:nombre.show')->only(['show']);
        $this->middleware('permission:nombre.destroy')->only(['destroy']);
    }


    public static $NOMBRE = 'NOMBRE';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nombres = Nombre::get();
        $marcas = Marca::get();

        return view('nombre.index', compact('nombres', 'marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::where('estado', false)->pluck('marca', 'id');

        return view('nombre.create', compact('marcas'));
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
            'id_marca' => 'required',
        ]);

        $nombre = new Nombre();
        $cambio = strtoupper($request->input('nombre'));
        $nombre->nombre = $cambio;
        $nombre->id_marca = $request->input('id_marca');
        $nombre->save();

        $marca = Marca::findOrFail($nombre->id_marca);

        $bita = new Bitacora();
        $bita->datos_nuevos = "Nombre:".$nombre->nombre." | Marca:".$marca->marca;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$NOMBRE;
        $bita->codigo_documento = $nombre->id;
        $bita->save();

        return redirect()->route('nombre.index')->with('success', 'Nombre de Auto Creado');
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
        $nombre = Nombre::findOrFail($id);
        $marcas = Marca::pluck('marca', 'id');
        $marcaA = Marca::findOrFail($nombre->id_marca);

        return view('nombre.edit', compact('nombre', 'marcas', 'marcaA'));
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
            'id_marca' => 'required',
        ]);

        $nombre = Nombre::findOrFail($id);

        $marca = Marca::findOrFail($nombre->id_marca);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombre:".$nombre->nombre." | Marca:".$marca->marca;

        $cambio = strtoupper($request->input('nombre'));
        $nombre->nombre = $cambio;
        $nombre->id_marca = $request->input('id_marca');
        $nombre->estado = $request->has('estado')? false : true;
        $nombre->save();

        $bita->datos_nuevos = "Nombre:".$nombre->nombre." | Marca:".$marca->marca;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$NOMBRE;
        $bita->codigo_documento = $nombre->id;
        $bita->save();

        return redirect()->route('nombre.index')->with('success', 'Nombre de auto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nombre = Nombre::findOrFail($id);
        $nombre->estado = true;
        $nombre->save();

        $marca = Marca::findOrFail($nombre->id_marca);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombre:".$nombre->nombre." | Marca:".$marca->marca;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$NOMBRE;
        $bita->codigo_documento = $nombre->id;
        $bita->save();

        return redirect()->route('nombre.index')->with('success', 'Nombre de Auto Eliminado');
    }
}
