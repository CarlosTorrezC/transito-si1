<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Telefono;
use App\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OficialesController extends Controller
{
    public function __construct(){
        $this->middleware('permission:oficial.create')->only(['create', 'store']);
        $this->middleware('permission:oficial.index')->only(['index']);
        $this->middleware('permission:oficial.edit')->only(['edit', 'update']);
        $this->middleware('permission:oficial.show')->only(['show']);
        $this->middleware('permission:oficial.destroy')->only(['destroy']);
    }

    public static $OFICIAL_S = 'OFICIAL';

    public function index(){
        $oficial = Persona::whereNotNull('codigo_oficial')
                            ->get();

        return view('oficial.index')->with('oficial', $oficial);
    }

    public function create(){
        return view('oficial.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'codigo_oficial' => 'required|alpha_num|min:8|max:15|unique:personas,codigo_oficial',
            'ci' => 'required|numeric|min:0|not_in:0|digits_between:5,8',
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
        ]);

        if (Persona::where('ci', '=', $request->input('ci'))->exists()) {
            $ofi = Persona::findOrFail($request->input('ci'));
            $ofi->codigo_oficial = $request->input('codigo_oficial');
            $cambio = strtoupper($request->input('nombres'));
            $ofi->nombres = $cambio;
            $cambio = strtoupper($request->input('apellidos'));
            $ofi->apellidos = $cambio;
            $ofi->nacionalidad = 'BOLIVIANA';
            $cambio = strtoupper($request->input('direccion'));
            $ofi->direccion = $cambio;
            $ofi->grupo_sanguineo = $request->input('grupo_sanguineo');
            $ofi->email = $request->input('email');
            $ofi->estado_oficial = false;
            $ofi->save();

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
        } else {
            $this->validate($request, [
                'email' => 'required|unique:personas,email|email',
            ]);

            $ofi = new Persona();
            $ofi->codigo_oficial = $request->input('codigo_oficial');
            $ofi->ci = $request->input('ci');
            $cambio = strtoupper($request->input('nombres'));
            $ofi->nombres = $cambio;
            $cambio = strtoupper($request->input('apellidos'));
            $ofi->apellidos = $cambio;
            $ofi->sexo = $request->input('sexo');
            $ofi->nacionalidad = 'BOLIVIANA';
            $ofi->fecha_nacimiento = $request->input('fecha_nacimiento');
            $cambio = strtoupper($request->input('direccion'));
            $ofi->direccion = $cambio;
            $ofi->grupo_sanguineo = $request->input('grupo_sanguineo');
            $ofi->email = $request->input('email');
            $ofi->estado_oficial = false;
            $ofi->estado_ciudadano = false;
            $ofi->save();
            
            if(!empty($request->input('telefono'))){
                $telf = new Telefono();
                $telf->numero = $request->input('telefono');
                $telf->ci_persona = $request->input('ci');
                $telf->save();
            }
        }

        $bita = new Bitacora();
        $bita->datos_nuevos = "Nombres:".$ofi->nombres." | Apellidos:".$ofi->apellidos." | Sexo:".$ofi->sexo." | Nacionalidad:".$ofi->nacionalidad." | Fecha Nacimiento:".$ofi->fecha_nacimiento." | Direccion:".$ofi->direccion." | Grupo Sanguineo:".$ofi->grupo_sanguineo." | Email:".$ofi->email." | Codigo Oficial:".$ofi->codigo_oficial;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$OFICIAL_S;
        $bita->codigo_documento = $ofi->ci;
        $bita->save();
        
        return back()->with('success', 'Oficial Creado');
    }    

    public function show($id){
        $oficial = Persona::findOrFail($id);
        $telf = Telefono::where('ci_persona', $oficial->ci)->first();
        return view('oficial.show', compact('oficial', 'telf'));
    }

    public function edit($id){
        $oficial = Persona::findOrFail($id);
        $telf = Telefono::where('ci_persona', $oficial->ci)->first();
        return view('oficial.edit', compact('oficial', 'telf'));
    }

    public function update(Request $request, $id){    
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'nacionalidad' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
        ]);

        $oficial = Persona::findOrFail($id);

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombres:".$oficial->nombres." | Apellidos:".$oficial->apellidos." | Nacionalidad:".$oficial->nacionalidad." | Direccion:".$oficial->direccion." | Email:".$oficial->email." | Codigo Oficial:".$oficial->codigo_oficial;
        
        $cambio = strtoupper($request->input('nombres'));
        $oficial->nombres = $cambio;
        $cambio = strtoupper($request->input('apellidos'));
        $oficial->apellidos = $cambio;
        $oficial->nacionalidad = $request->input('nacionalidad');
        $cambio = strtoupper($request->input('direccion'));
        $oficial->direccion = $cambio;
        $oficial->email = $request->input('email');
        $oficial->estado_oficial = $request->has('estado_oficial')? false : true;
        $oficial->save();
        
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

        $bita->datos_nuevos = "Nombres:".$oficial->nombres." | Apellidos:".$oficial->apellidos." | Nacionalidad:".$oficial->nacionalidad." | Direccion:".$oficial->direccion." | Email:".$oficial->email." | Codigo Oficial:".$oficial->codigo_oficial;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$OFICIAL_S;
        $bita->codigo_documento = $oficial->ci;
        $bita->save();      
    
        return redirect()->route('oficial.show', $oficial->ci)->with('success', 'Oficial Actualizado');
    }

    public function destroy($id){
        $oficial = Persona::findOrFail($id);

        if(Telefono::where('ci_persona', $id)->exists()){
            $telf = Telefono::where('ci_persona', $id)->first();
            $telf->delete();
        }

        $oficial->estado_oficial = true;
        $oficial->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Nombres:".$oficial->nombres." | Apellidos:".$oficial->apellidos." | Sexo:".$oficial->sexo." | Nacionalidad:".$oficial->nacionalidad." | Fecha Nacimiento:".$oficial->fecha_nacimiento." | Direccion:".$oficial->direccion." | Grupo Sanguineo:".$oficial->grupo_sanguineo." | Email:".$oficial->email." | Codigo Oficial:".$oficial->codigo_oficial;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$OFICIAL_S;
        $bita->codigo_documento = $oficial->ci;
        $bita->save();

        return redirect()->route('oficial.index')->with('success', 'Oficial Eliminado');
    }
}
