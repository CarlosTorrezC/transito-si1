<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Color;
use App\TipoVehiculo;
use App\Persona;
use App\Bitacora;
use Carbon\Carbon;
use App\Multa;
use App\DetalleMulta;
use App\Infraccion;
use App\Historial;
use App\Seguro;
use App\Marca;
use App\Nombre;
use App\Telefono;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class VehiculosController extends Controller
{

    public function __construct(){
        $this->middleware('permission:vehiculo.create')->only(['create', 'store']);
        $this->middleware('permission:vehiculo.index')->only(['index']);
        $this->middleware('permission:vehiculo.edit')->only(['edit', 'update']);
        $this->middleware('permission:vehiculo.show')->only(['show']);
        $this->middleware('permission:vehiculo.destroy')->only(['destroy']);
    }

    public static $VEHICULO_S = 'VEHICULO';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::get();
        return view('vehiculo.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color = Color::where('estado', false)->pluck('nombre', 'id');
        $tipoV = TipoVehiculo::where('estado', false)->pluck('descripcion', 'id');

        $marca = Marca::where('estado', false)->get();
        //$nombre = Nombre::all();

        
        return view('vehiculo.create', compact('color', 'tipoV', 'marca'));//, 'nombre'));
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
            'ci_persona' => 'required|exists:personas,ci',
            'placa' => 'required|unique:vehiculos,placa',
            'marca' => 'required',
            'nombre' => 'required',
            'modelo' => 'required|numeric',
            'nrochasis' => 'required',
            'nromotor' => 'required',
            'id_color' => 'required',
            'id_tipovehiculo' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if(Persona::where('ci', $request->input('ci_persona'))->where('estado_ciudadano', true)->exists()){
            return back()->with('error', 'CI del ciudadano esta Inactivo');
        }

        $pers = Persona::findOrFail($request->input('ci_persona'));
        if(is_null($pers->estado_ciudadano)){
            $pers->estado_ciudadano = false;
            $pers->save();
        }

        //Handle File
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt ,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $veh = new Vehiculo();
        $veh->ci_persona = $request->input('ci_persona');
        $cambio = strtoupper($request->input('placa'));
        $veh->placa = $cambio;
        $veh->marca = $request->input('marca'); 
        $veh->nombre = $request->input('nombre');
        $veh->modelo = $request->input('modelo');
        $cambio = strtoupper($request->input('nrochasis'));
        $veh->nrochasis = $cambio;
        $cambio = strtoupper($request->input('nromotor'));
        $veh->nromotor = $cambio;
        $veh->id_color = $request->input('id_color');
        $veh->id_tipovehiculo = $request->input('id_tipovehiculo');
        $veh->cover_image = $fileNameToStore;
        $veh->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "CI:".$veh->ci_persona." | Marca:".$veh->marca." | Nombre:".$veh->nombre." | Modelo:".$veh->modelo." | Nro Chasis:".$veh->nrochasis." | Nro Motor:".$veh->nromotor." | Color:".$veh->id_color."  | Tipo Vehiculo:".$veh->id_tipovehiculo;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$VEHICULO_S;
        $bita->codigo_documento = $veh->placa;
        $bita->save();
        //dd($bita);
        
        return redirect()->route('vehiculo.show', $veh->placa)->with('success', 'Vehiculo Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $tipoV = TipoVehiculo::where('id', $vehiculo->id_tipovehiculo)->first();
        $color = Color::where('id', $vehiculo->id_color)->first();
        $propietario = Persona::findOrFail($vehiculo->ci_persona);
        $telf = Telefono::where('ci_persona', $propietario->ci)->first();

        return view('vehiculo.show', compact('vehiculo', 'tipoV', 'color', 'propietario', 'telf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $color = Color::pluck('nombre', 'id');
        $tipoVA = TipoVehiculo::where('id', $vehiculo->id_tipovehiculo)->first();
        $colorA = Color::where('id', $vehiculo->id_color)->first();

        return view('vehiculo.edit', compact('vehiculo','tipoVA', 'colorA', 'color'));
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
            'ci_persona' => 'required|exists:personas,ci',
            'id_color' => 'required',
        ]);

        if(Persona::where('ci', $request->input('ci_persona'))->where('estado_ciudadano', true)->exists()){
            return back()->with('error', 'CI del ciudadano esta Inactivo');
        }

         //Handle File
         if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt ,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
    
        $veh = Vehiculo::findOrFail($id);
        $bita = new Bitacora();
        $bita->datos_antiguos = "CI:".$veh->ci_persona." | Color:".$veh->id_color;
        
        $veh->ci_persona = $request->input('ci_persona');       
        $veh->id_color = $request->input('id_color');
        $veh->estado = $request->has('estado')? false:true;
        if($request->hasFile('cover_image')){
            if($veh->cover_image != 'noimage.jpg'){
                //Delete image
                Storage::delete('/public/cover_images/'.$veh->cover_image);
            }
            $veh->cover_image = $fileNameToStore;
        }
        $veh->save();

        $bita->datos_nuevos = "CI:".$veh->ci_persona." | Color:".$veh->id_color;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$VEHICULO_S;
        $bita->codigo_documento = $veh->placa;
        $bita->save();
    
        return redirect()->route('vehiculo.show', $veh->placa)->with('success', 'Vehiculo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veh = Vehiculo::findOrFail($id);
        $veh->estado = true;
        $veh->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI:".$veh->ci_persona." | Marca:".$veh->marca." | Nombre:".$veh->nombre." | Modelo:".$veh->modelo." | Nro Chasis:".$veh->nrochasis." | Nro Motor:".$veh->nromotor." | Color:".$veh->id_color." | Tipo Vehiculo:".$veh->id_tipovehiculo;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$VEHICULO_S;
        $bita->codigo_documento = $veh->placa;
        $bita->save();

        return redirect()->route('vehiculo.index')->with('success', 'Vehiculo Eliminado');
    }

    public function consulta(){ 
        return view('vehiculo.consulta');
    }

    public function resultados(Request $request){
        $this->validate($request, [
            'placa' => 'required|exists:vehiculos,placa',
        ]);
        
        //Vehiculo::where('placa', $request->input('placa'))->where('estado', true)->exists();
        if(Vehiculo::where('placa', $request->input('placa'))->where('estado', true)->exists()){
            return back()->with('error', 'Vehiculo Inactivo');
        }

        $vehiculo = Vehiculo::findOrFail($request->input('placa'));
        $persona = Persona::findOrFail($vehiculo->ci_persona);
        $color = Color::findOrFail($vehiculo->id_color);
        $tipoVehiculo = TipoVehiculo::findOrFail($vehiculo->id_tipovehiculo);

        $multa = Multa::where('placa_vehiculo', $vehiculo->placa)->get();
        $multaA = Multa::where('placa_vehiculo', $vehiculo->placa)
                        ->where('estado', false)
                        ->get();
        
        $historial = Historial::where('placa_vehiculo', $vehiculo->placa)->get();

        $seguro = Seguro::where('placa_vehiculo', $vehiculo->placa)->first();
        
        return view('vehiculo.resultado', compact('vehiculo', 'persona', 'color', 'tipoVehiculo', 'multa', 'multaA', 'historial', 'seguro'));//, 'detalle', 'infracciones'));
    }
}
