<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LicenciaM;
use App\Persona;
use Carbon\Carbon;
use App\Bitacora;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class LicenciaMController extends Controller
{
    public function __construct(){
        $this->middleware('permission:licenciasM.create')->only(['create', 'store']);
        $this->middleware('permission:licenciasM.index')->only(['index']);
        $this->middleware('permission:licenciasM.edit')->only(['edit', 'update']);
        $this->middleware('permission:licenciasM.show')->only(['show']);
        $this->middleware('permission:licenciasM.destroy')->only(['destroy']);
    }

    public static $LICENCIA_M = 'LICENCIA M';

    public function index(){
        //$licM = LicenciaM::where('estado', false)->orderBy('id', 'asc')->paginate(10);

        $licM = DB::table('licencia_m_s')
                    ->join('personas', 'licencia_m_s.ci_persona', '=', 'personas.ci')
                    ->select('licencia_m_s.*', 'personas.*')
                    ->get();

        return view('licenciasM.index')->with('licM', $licM);
    }

    public function create(){
        return view('licenciasM.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'ci_persona' => 'required|exists:personas,ci|min:0|not_in:0|unique:licencia_m_s,ci_persona',
            'cover_image' => 'image|nullable|max:1999',
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
    
        $licM = new licenciaM();
        $licM->emision = Carbon::now();
        $till = Carbon::now();
        $licM->vencimiento = $till->addYears(4);
        $licM->lentes = $request->has('lentes')? true : false; 
        $licM->audifonos = $request->has('audifonos')? true : false;
        $licM->ci_persona = $request->input('ci_persona');
        $licM->cover_image = $fileNameToStore;
        $licM->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "CI Portador:".$licM->ci_persona." | Emision:".$licM->emision." | Vencimiento:".$licM->vencimiento." | Lentes:".$licM->lentes." | Audifonos:".$licM->audifonos;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$LICENCIA_M;
        $bita->codigo_documento = $licM->id;
        $bita->save();
    
        return redirect()->route('licenciasM.show', $licM->id);
    }    

    public function show($id){
        $licM = LicenciaM::findOrFail($id);
        $portador = Persona::findOrFail($licM->ci_persona);

        return view('licenciasM.show', compact('licM', 'portador'));
    }

    public function edit($id){
        $licM = LicenciaM::findOrFail($id);
        $portador = Persona::findOrFail($licM->ci_persona);
        return view('licenciasM.edit', compact('licM', 'portador'));
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

        $licM = licenciaM::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Portador:".$licM->ci_persona." | Emision:".$licM->emision." | Vencimiento:".$licM->vencimiento." | Lentes:".$licM->lentes." | Audifonos:".$licM->audifonos;

        $licM->emision = Carbon::now();
        $till = Carbon::now();
        $licM->vencimiento = $till->addYears(4);
        $licM->lentes = $request->has('lentes')? true : false; 
        $licM->audifonos = $request->has('audifonos')? true : false;
        $licM->estado = $request->has('estado')? false : true;
        if($request->hasFile('cover_image')){
            if($licM->cover_image != 'noimage.jpg'){
                //Delete image
                Storage::delete('/public/cover_images/'.$licM->cover_image);
                //Storage::disk('public')->delete('/cover_images/'.$licM->cover_image);
            }
            $licM->cover_image = $fileNameToStore;
        }
        $licM->save();

        $bita->datos_nuevos = "CI Portador:".$licM->ci_persona." | Emision:".$licM->emision." | Vencimiento:".$licM->vencimiento." | Lentes:".$licM->lentes." | Audifonos:".$licM->audifonos;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$LICENCIA_M;
        $bita->codigo_documento = $licM->id;
        $bita->save();
    
        return redirect()->route('licenciasM.show', $licM->id);
    }

    public function destroy($id){
        $licM = licenciaM::findOrFail($id);
        $licM->estado = true;
        $licM->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Portador:".$licM->ci_persona." | Emision:".$licM->emision." | Vencimiento:".$licM->vencimiento." | Lentes:".$licM->lentes." | Audifonos:".$licM->audifonos;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$LICENCIA_M;
        $bita->codigo_documento = $licM->id;
        $bita->save();

        return redirect()->route('licenciasM.index')->with('success', 'Licencia Eliminada');
    }
}
