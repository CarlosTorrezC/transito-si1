<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LicenciaA;
use App\Persona;
use App\Categoria;
use Carbon\Carbon;
use App\Bitacora;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class LicenciaAController extends Controller
{
    public function __construct(){
        $this->middleware('permission:licenciasA.create')->only(['create', 'store']);
        $this->middleware('permission:licenciasA.index')->only(['index']);
        $this->middleware('permission:licenciasA.edit')->only(['edit', 'update']);
        $this->middleware('permission:licenciasA.show')->only(['show']);
        $this->middleware('permission:licenciasA.destroy')->only(['destroy']);
    }

    public static $LICENCIA_A = 'LICENCIA A';

    public function index(){
        //$licA = LicenciaA::where('estado', false )->orderBy('id', 'asc')->paginate(10);

        $licA = DB::table('licencia_a_s')
                    ->join('personas', 'licencia_a_s.ci_persona', '=', 'personas.ci')
                    ->select('licencia_a_s.*', 'personas.*')
                    ->get();

        return view('licenciasA.index')->with('licA', $licA);
    }

    public function create(){
        $cat = Categoria::where('estado', false)->pluck('nombre', 'categoria');
        return view('licenciasA.create')->with('cat', $cat);
    }

    public function store(Request $request){
        $this->validate($request, [
            'ci_persona' => 'required|exists:personas,ci|min:0|not_in:0|unique:licencia_a_s,ci_persona',
            'categoria_licencia' => 'required',
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
    
        $licA = new licenciaA();
        $licA->emision = Carbon::now();
        $till = Carbon::now();
        $licA->vencimiento = $till->addYears(4);
        $licA->lentes = $request->has('lentes')? true : false; 
        $licA->audifonos = $request->has('audifonos')? true : false;
        $licA->ci_persona = $request->input('ci_persona');
        $licA->categoria_licencia = $request->input('categoria_licencia');
        $licA->cover_image = $fileNameToStore;
        $licA->save();

        $bita = new Bitacora();
        $bita->datos_nuevos = "CI Portador:".$licA->ci_persona." | Emision:".$licA->emision." | Vencimiento:".$licA->vencimiento." | Lentes:".$licA->lentes." | Audifonos:".$licA->audifonos." | Categoria:".$licA->categoria_licencia;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$LICENCIA_A;
        $bita->codigo_documento = $licA->id;
        $bita->save();
    
        return redirect()->route('licenciasA.show', $licA->id);
    }    

    public function show($id){
        $licA = LicenciaA::findOrFail($id);
        $cat = Categoria::findOrFail($licA->categoria_licencia);
        $portador = Persona::findOrFail($licA->ci_persona);

        return view('licenciasA.show', compact('licA', 'cat', 'portador'));
    }

    public function edit($id){
        $licA = LicenciaA::findOrFail($id);
        $catA = Categoria::where('categoria', $licA->categoria_licencia)->first();
        $cat = Categoria::pluck('nombre', 'categoria');
        $portador = Persona::findOrFail($licA->ci_persona);

        return view('licenciasA.edit', compact('licA', 'catA', 'cat', 'portador'));
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


        $licA = licenciaA::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Portador:".$licA->ci_persona." | Emision:".$licA->emision." | Vencimiento:".$licA->vencimiento." | Lentes:".$licA->lentes." | Audifonos:".$licA->audifonos." | Categoria:".$licA->categoria_licencia;

        $licA->emision = Carbon::now();
        $till = Carbon::now();
        $licA->vencimiento = $till->addYears(4);
        $licA->lentes = $request->has('lentes')? true : false; 
        $licA->audifonos = $request->has('audifonos')? true : false;
        $licA->categoria_licencia = $request->input('categoria_licencia');
        $licA->estado = $request->has('estado')? false: true;
        if($request->hasFile('cover_image')){
            if($licA->cover_image != 'noimage.jpg'){
                //Delete image
                Storage::delete('/public/cover_images/'.$licA->cover_image);
            }
            $licA->cover_image = $fileNameToStore;
        }
        $licA->save();

        $bita->datos_nuevos = "CI Portador:".$licA->ci_persona." | Emision:".$licA->emision." | Vencimiento:".$licA->vencimiento." | Lentes:".$licA->lentes." | Audifonos:".$licA->audifonos." | Categoria:".$licA->categoria_licencia;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$LICENCIA_A;
        $bita->codigo_documento = $licA->id;
        $bita->save();
    
        return redirect()->route('licenciasA.show', $licA->id);
    }

    public function destroy($id){
        $licA = licenciaA::findOrFail($id);
        $licA->estado = true;
        $licA->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "CI Portador:".$licA->ci_persona." | Emision:".$licA->emision." | Vencimiento:".$licA->vencimiento." | Lentes:".$licA->lentes." | Audifonos:".$licA->audifonos." | Categoria:".$licA->categoria_licencia;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$LICENCIA_A;
        $bita->codigo_documento = $licA->id;
        $bita->save();

        return redirect()->route('licenciasA.index')->with('success', 'Licencia Eliminada');
    }
}
