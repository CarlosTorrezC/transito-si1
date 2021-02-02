<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LicenciaT;
use App\Persona;
use Carbon\Carbon;
use App\Bitacora;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class LicenciaTController extends Controller
{
    public function __construct(){
        $this->middleware('permission:licenciasT.create')->only(['create', 'store']);
        $this->middleware('permission:licenciasT.index')->only(['index']);
        $this->middleware('permission:licenciasT.edit')->only(['edit', 'update']);
        $this->middleware('permission:licenciasT.show')->only(['show']);
        $this->middleware('permission:licenciasT.destroy')->only(['destroy']);
    }

    public static $LICENCIA_T = 'LICENCIA T';

    public function index(){
        /*$licT = LicenciaT::where('estado', false)->orderBy('id', 'asc')->paginate(10);
        $licT = $licT->load('persona');*/

        $licT = DB::table('licencia_t_s')
                    ->join('personas', 'licencia_t_s.ci_persona', '=', 'personas.ci')
                    ->select('licencia_t_s.*', 'personas.*')
                    ->get();

        return view('licenciasT.index')->with('licT', $licT);
    }

    public function create(){
        return view('licenciasT.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'ci_persona' => 'required|exists:personas,ci|min:0|not_in:0|unique:licencia_t_s,ci_persona',
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
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $pers = Persona::findOrFail($request->input('ci_persona'));
        if(is_null($pers->estado_ciudadano)){
            $pers->estado_ciudadano = false;
            $pers->save();
        }
    
        $licT = new licenciaT();
        $licT->emision = Carbon::now();
        $till = Carbon::now();
        $licT->vencimiento = $till->addYears(4);
        $licT->lentes = $request->has('lentes')? true : false; 
        $licT->audifonos = $request->has('audifonos')? true : false;
        $licT->ci_persona = $request->input('ci_persona');
        $licT->cover_image = $fileNameToStore;
        $licT->save();
    
        $bita = new Bitacora();
        $bita->datos_nuevos = "CI Portador:".$licT->ci_persona." | Emision:".$licT->emision." | Vencimiento:".$licT->vencimiento." | Lentes:".$licT->lentes." | Audifonos:".$licT->audifonos;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$LICENCIA_T;
        $bita->codigo_documento = $licT->id;
        $bita->save();

        return redirect()->route('licenciasT.show', $licT->id);
    }    

    public function show($id){
        $licT = LicenciaT::findOrFail($id);
        $portador = Persona::findOrFail($licT->ci_persona);
        return view('licenciasT.show', compact('licT', 'portador'));
    }

    public function edit($id){
        $licT = LicenciaT::findOrFail($id);
        $portador = Persona::findOrFail($licT->ci_persona);
        return view('licenciasT.edit', compact('licT', 'portador'));
    }

    public function update(Request $request, $id){   
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
        
        $licT = licenciaT::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Portador:".$licT->ci_persona." | Emision:".$licT->emision." | Vencimiento:".$licT->vencimiento." | Lentes:".$licT->lentes." | Audifonos:".$licT->audifonos;

        $licT->emision = Carbon::now();
        $till = Carbon::now();
        $licT->vencimiento = $till->addYears(4);
        $licT->lentes = $request->has('lentes')? true : false; 
        $licT->audifonos = $request->has('audifonos')? true : false;
        $licT->estado = $request->has('estado')? false : true;
        if($request->hasFile('cover_image')){
            if($licT->cover_image != 'noimage.jpg'){
                //Delete image
                Storage::delete('/public/cover_images/'.$licT->cover_image);
            }
            $licT->cover_image = $fileNameToStore;
        }
        $licT->save();

        $bita->datos_nuevos = "CI Portador:".$licT->ci_persona." | Emision:".$licT->emision." | Vencimiento:".$licT->vencimiento." | Lentes:".$licT->lentes." | Audifonos:".$licT->audifonos;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$LICENCIA_T;
        $bita->codigo_documento = $licT->id;
        $bita->save();
    
        return redirect()->route('licenciasT.show', $licT->id);
    }

    public function destroy($id){
        $licT = licenciaT::findOrFail($id);
        $licT->estado = true;
        $licT->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Portador:".$licT->ci_persona." | Emision:".$licT->emision." | Vencimiento:".$licT->vencimiento." | Lentes:".$licT->lentes." | Audifonos:".$licT->audifonos;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$LICENCIA_T;
        $bita->codigo_documento = $licT->id;
        $bita->save();

        return redirect()->route('licenciasT.index')->with('success', 'Licencia Eliminada');
    }
}
