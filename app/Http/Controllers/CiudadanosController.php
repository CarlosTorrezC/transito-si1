<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\LicenciaA;
use App\LicenciaT;
use App\LicenciaM;
use App\Telefono;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CiudadanosController extends Controller
{
    public function __construct(){
        $this->middleware('permission:ciudadano.create')->only(['create', 'store']);
        $this->middleware('permission:ciudadano.index')->only(['index']);
        $this->middleware('permission:ciudadano.edit')->only(['edit', 'update']);
        $this->middleware('permission:ciudadano.show')->only(['show']);
        $this->middleware('permission:ciudadano.destroy')->only(['destroy']);
    }

    public static $CIUDADANO_S = 'CIUDADANO';

    public function index(){
        //$ciudadano = Persona::where('estado_ciudadano', false)->orderBy('ci', 'asc')->get();//paginate(10);
        $ciudadano = Persona::get();
        
        return view('ciudadano.index')->with('ciudadano', $ciudadano);
    }


    public function create(){
        return view('ciudadano.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'ci' => 'required|numeric|min:0|not_in:0|digits_between:5,8|unique:personas,ci',
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'nacionalidad' => 'required',
            'direccion' => 'required',
            'grupo_sanguineo' => 'required',
            'email' => 'required|unique:personas,email|email',
        ]);

        if (Persona::where('ci', '=', $request->input('ci'))->exists()) {
            $ciud = Persona::findOrFail($request->input('ci'));
            $cambio = strtoupper($request->input('nombres'));
            $ciud->nombres = $cambio;
            $cambio = strtoupper($request->input('apellidos'));
            $ciud->apellidos = $cambio;
            $ciud->nacionalidad = $request->input('nacionalidad');
            $cambio = strtoupper($request->input('direccion'));
            $ciud->direccion = $cambio;
            $ciud->grupo_sanguineo = $request->input('grupo_sanguineo');
            $ciud->email = $request->input('email');
            $ciud->estado_ciudadano = false;
            $ciud->save();

            if(!empty($request->input('telefono'))){
                if (Telefono::where('ci_persona', $ofi->ci)->first()){
                    $telf = Telefono::where('ci_persona', $ofi->ci)->first();
                    $telf->delete();
                }
                $telf = new Telefono();
                $telf->numero = $request->input('telefono');
                $telf->ci_persona = $request->input('ci');
                $telf->save();
            }
        }else{
            $ciud = new Persona();
            $ciud->ci = $request->input('ci');
            $cambio = strtoupper($request->input('nombres'));
            $ciud->nombres = $cambio;
            $cambio = strtoupper($request->input('apellidos'));
            $ciud->apellidos = $cambio;
            $ciud->sexo = $request->input('sexo');
            $ciud->nacionalidad = $request->input('nacionalidad');
            $ciud->fecha_nacimiento = $request->input('fecha_nacimiento');
            $cambio = strtoupper($request->input('direccion'));
            $ciud->direccion = $cambio;
            $ciud->grupo_sanguineo = $request->input('grupo_sanguineo');
            $ciud->email = $request->input('email');
            $ciud->estado_ciudadano = false;
            $ciud->save();
            
            if(!empty($request->input('telefono'))){
                $telf = new Telefono();
                $telf->numero = $request->input('telefono');
                $telf->ci_persona = $request->input('ci');
                $telf->save();
            }
        }

        $bita = new Bitacora();
        $bita->datos_nuevos = "Nombres:".$ciud->nombres." | Apellidos:".$ciud->apellidos." | Sexo:".$ciud->sexo." | Nacionalidad:".$ciud->nacionalidad." | Fecha Nacimiento:".$ciud->fecha_nacimiento." | Direccion:".$ciud->direccion." | Grupo Sanguineo:".$ciud->grupo_sanguineo." | Email:".$ciud->email;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$CIUDADANO_S;
        $bita->codigo_documento = $ciud->ci;
        $bita->save();
    
        return back()->with('success', 'Ciudadano Creado');
    }    

    public function show($id){
        $ciudadano = Persona::findOrFail($id);
        $telf = Telefono::where('ci_persona', $ciudadano->ci)->first();
        return view('ciudadano.show', compact('ciudadano', 'telf'));
    }

    public function edit($id){
        $ciudadano = Persona::findOrFail($id);
        $telf = Telefono::where('ci_persona', $ciudadano->ci)->first();
        
        return view('ciudadano.edit', compact('ciudadano', 'telf'));
    }

    public function update(Request $request, $id){    
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'nacionalidad' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
        ]);

        $ciud = Persona::findOrFail($id);
        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombres:".$ciud->nombres." | Apellidos:".$ciud->apellidos." | Nacionalidad:".$ciud->nacionalidad." | Direccion:".$ciud->direccion." | Email:".$ciud->email;
        $cambio = strtoupper($request->input('nombres'));
        $ciud->nombres = $cambio;
        $cambio = strtoupper($request->input('apellidos'));
        $ciud->apellidos = $cambio;
        $ciud->nacionalidad = $request->input('nacionalidad');
        $cambio = strtoupper($request->input('direccion'));
        $ciud->direccion = $cambio;
        $ciud->email = $request->input('email');
        $ciud->estado_ciudadano = $request->has('estado_ciudadano')? false : true;
        $ciud->save();
        
        if(!empty($request->input('telefono'))){
            if(Telefono::where('ci_persona', $id)->first()){
                $tel = Telefono::where('ci_persona', $id)->first();
                $tel->delete();   
            }
            $tel = new Telefono();
            $tel->numero = $request->input('telefono');
            $tel->ci_persona = $id;
            $tel->save();
        }

        $bita->datos_nuevos = "Nombres:".$ciud->nombres." | Apellidos:".$ciud->apellidos." | Nacionalidad:".$ciud->nacionalidad." | Direccion:".$ciud->direccion." | Email:".$ciud->email;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$CIUDADANO_S;
        $bita->codigo_documento = $ciud->ci;
        $bita->save();
        
    
        return redirect()->route('ciudadano.show', $ciud->ci)->with('success', 'Ciudadano Actualizado');
    }

    public function destroy($id){
        $ciud = Persona::findOrFail($id);

        if(Telefono::where('ci_persona', $id)->exists()){
            $telf = Telefono::where('ci_persona', $id)->first();
            $telf->delete();
        }

        $ciud->estado_ciudadano = true;
        $ciud->save();

        $licA = LicenciaA::where('ci_persona', $ciud->ci)->where('estado', false)->first();
        $licM = LicenciaM::where('ci_persona', $ciud->ci)->where('estado', false)->first();
        $licT = LicenciaT::where('ci_persona', $ciud->ci)->where('estado', false)->first();
        if(!is_null($licA)){
            $licA->estado = true;
            $licA->save();
        }
        if(!is_null($licM)){
            $licM->estado = true;
            $licM->save();
        }
        if(!is_null($licT)){
            $licT->estado = true;
            $licT->save();
        }

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombres:".$ciud->nombres." | Apellidos:".$ciud->apellidos." | Sexo:".$ciud->sexo." | Nacionalidad:".$ciud->nacionalidad." | Fecha Nacimiento:".$ciud->fecha_nacimiento." | Direccion:".$ciud->direccion." | Grupo Sanguineo:".$ciud->grupo_sanguineo." | Email:".$ciud->email;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$CIUDADANO_S;
        $bita->codigo_documento = $ciud->ci;
        $bita->save();

        return redirect()->route('ciudadano.index')->with('success', 'Ciudadano Eliminado');
    }
}
