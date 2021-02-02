<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Nombre;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MarcasController extends Controller
{
    public function __construct(){
        $this->middleware('permission:marcas.create')->only(['create', 'store']);
        $this->middleware('permission:marcas.index')->only(['index']);
        $this->middleware('permission:marcas.edit')->only(['edit', 'update']);
        $this->middleware('permission:marcas.show')->only(['show']);
        $this->middleware('permission:marcas.destroy')->only(['destroy']);
    }

    public static $MARCA = 'MARCA';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = Marca::get();

        return view('marcas.index', compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
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
            'marca' => 'required|unique:marcas,marca',
        ]);
        
        
            if(Marca::where('marca', $request->input('marca'))  
                        ->where('estado', false)->exists()){
                return back()->with('error', 'Marca Inactivo'); 
            }
        
            $marca = new Marca();
            $cambio = strtoupper($request->input('marca'));
            $marca->marca = $cambio;
            $marca->save();
        

            $bita = new Bitacora();
            $bita->datos_nuevos = "Marca:".$marca->marca;
            $bita->fecha_hora = Carbon::now()->toDateTimeString();
            $bita->id_usuario = Auth::user()->id;
            $bita->ip = request()->ip();
            $bita->id_operacion = Bitacora::OP_CREATE();
            $bita->modulo = self::$MARCA;
            $bita->codigo_documento = $marca->id;
            $bita->save();

        return back()->with('success', 'Marca Creado');
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
        $marca = Marca::findOrFail($id);

        return view('marcas.edit', compact('marca'));
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
            'marca' => 'required',
        ]);

        $marca = Marca::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Marca:".$marca->marca;

        $cambio = strtoupper($request->input('marca'));
        $marca->marca = $cambio;
        $marca->estado = $request->has('estado')? false : true;
        $marca->save();

        $bita->datos_nuevos = "Marca:".$marca->marca;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$MARCA;
        $bita->codigo_documento = $marca->id;
        $bita->save();

        return back()->with('success', 'Marca Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->estado = true;
        $marca->save();

        $nombres = Nombre::where('id_marca', $marca->id)->get();
        foreach($nombres as $nom){
            $nom->estado = true;
            $nom->save();
        }

        $bita = new Bitacora();
        $bita->datos_antiguos = "Marca:".$marca->marca;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$MARCA;
        $bita->codigo_documento = $marca->id;
        $bita->save();

        return redirect()->route('marcas.index')->with('success', 'Marca Eliminado');
    }
}
