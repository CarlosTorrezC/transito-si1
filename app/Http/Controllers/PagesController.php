<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LicenciaA;
use App\LicenciaT;
use App\LicenciaM;
use App\Persona;
use App\Marca;
use App\Nombre;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('permission:pages.consulta')->only(['consulta']);
    }

    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $service = array(
            'Asegurar la seguridad de la ciudadania', 
            'Controlar los vehiculos que circulan', 
            'Controlar las normas de Transito',
        );
        return view('pages.services')->with('service', $service);
    }
    public function consulta(){
        return view('pages.consulta');
    }
    public function resultados(Request $request){
        $this->validate($request, [
            'licencia' => 'required|exists:personas,ci',
        ]);
        
        $pers = Persona::findOrFail($request->input('licencia'));

        $licA = LicenciaA::where('ci_persona', $pers->ci)->first();
        $licT = LicenciaT::where('ci_persona', $pers->ci)->first();
        $licM = LicenciaM::where('ci_persona', $pers->ci)->first();

        return view('pages.resultado', compact('pers', 'licA', 'licM', 'licT'));
    }

    public function byProject($id){
        $marca = Marca::where('marca', $id)->first();
        return Nombre::where('id_marca', $marca->id)->get();
    }
    

}
