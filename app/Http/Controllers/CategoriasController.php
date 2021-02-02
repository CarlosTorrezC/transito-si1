<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('permission:categorias.create')->only(['create', 'store']);
        $this->middleware('permission:categorias.index')->only(['index']);
        $this->middleware('permission:categorias.edit')->only(['edit', 'update']);
        $this->middleware('permission:categorias.show')->only(['show']);
        $this->middleware('permission:categorias.destroy')->only(['destroy']);
    }

    public static $CATEGORIA_S = 'CATEGORIA';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::get();
        return view('categorias.index')->with('categoria', $categoria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            'categoria' => 'required|unique:categorias,categoria|alpha|size:1',
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $cate = new Categoria();
        $cambio = strtoupper($request->input('categoria'));
        $cate->categoria = $cambio;
        $cate->nombre = $request->input('nombre');
        $cate->descripcion = $request->input('descripcion');
        $cate->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "Nombre:".$cate->nombre." | Descripcion:".$cate->descripcion;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$CATEGORIA_S;
        $bita->codigo_documento = $cate->id;
        $bita->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria Creada');
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
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit')->with('categoria', $categoria);
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
            'categoria' => 'required|alpha|size:1',
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $cate = Categoria::findOrFail($id);
        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombre:".$cate->nombre." | Descripcion:".$cate->descripcion;
        $cambio = strtoupper($request->input('categoria'));
        $cate->categoria = $cambio;
        $cate->nombre = $request->input('nombre');
        $cate->descripcion = $request->input('descripcion');
        $cate->estado= $request->has('estado')? false : true;
        $cate->save();

        $bita->datos_nuevos = "Nombre:".$cate->nombre." | Descripcion:".$cate->descripcion;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$CATEGORIA_S;
        $bita->codigo_documento = $cate->id;
        $bita->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria Editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Categoria::findOrFail($id);
        $cate->estado = true;
        $cate->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombre:".$cate->nombre." | Descripcion:".$cate->descripcion;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$CATEGORIA_S;
        $bita->codigo_documento = $cate->id;
        $bita->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria Eliminada');
    }
}
