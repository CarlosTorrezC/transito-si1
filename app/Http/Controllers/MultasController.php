<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multa;
use App\Infraccion;
use App\DetalleMulta;
use App\Vehiculo;
use App\Telefono;
use Carbon\Carbon;
use App\Bitacora;
use App\Persona;
use App\Historial;
use App\Titulo;
use App\Capitulo;
use App\LicenciaT;
use App\LicenciaM;
use App\LicenciaA;
use DB;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MultasController extends Controller
{
    public function __construct(){
        $this->middleware('permission:multa.create')->only(['create', 'store']);
        $this->middleware('permission:multa.index')->only(['index']);
        $this->middleware('permission:multa.edit')->only(['edit', 'update']);
        $this->middleware('permission:multa.show')->only(['show']);
        $this->middleware('permission:multa.destroy')->only(['destroy']);
    }

    public static $MULTA_S = 'MULTA'; 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multa = Multa::get();

        return view('multa.index', compact('multa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infracciones = Infraccion::all();
        $titulo = Titulo::where('estado', false)->get();
        $capitulo = Capitulo::all();

        return view('multa.create', compact('infracciones', 'titulo', 'capitulo'));
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
            'descripcion' => 'required',
            'placa_vehiculo' => 'required|exists:vehiculos,placa',
            'codigo_oficial' => 'required|exists:personas,codigo_oficial',
            'id_infraccion' => 'required',
            'nombre_infractor' => 'required',
            'nrolicencia_infractor' => 'required',
        ]); 

        $nombre = '';
        if($request->has('licenciaM')){
            if(LicenciaM::where('ci_persona', $request->input('nrolicencia_infractor'))->where('estado', true)->exists()){
                return back()->with('error', 'Nro de licencia esta Inactivo');
            }
            $nombre = 'LICENCIA M';
        }
        if($request->has('licenciaT')){
            if(LicenciaT::where('ci_persona', $request->input('nrolicencia_infractor'))->where('estado', true)->exists()){
                return back()->with('error', 'Nro de licencia esta Inactivo');
            }
            $nombre = 'LICENCIA T';
        } 
        if($request->has('licenciaA')){
            if(LicenciaA::where('ci_persona', $request->input('nrolicencia_infractor'))->where('estado', true)->exists()){
                return back()->with('error', 'Nro de licencia esta Inactivo');
            }
            $nombre = 'LICENCIA A';
        }
            
        
        if(Vehiculo::where('placa', $request->input('placa_vehiculo'))->where('estado', true)->exists()){
            return back()->with('error', 'Placa del Vehiculo Inactivo');
        }
        if(Persona::where('codigo_oficial', $request->input('codigo_oficial'))->where('estado_oficial', true)->exists()){
            return back()->with('error', 'Codigo del Oficial Inactivo');
        }

        $time = Carbon::now()->toDateTimeString();

        //Crear Multa
        $mul = new Multa();
        $mul->fecha_hora = $time;
        $cambio = strtoupper($request->input('descripcion'));
        $mul->descripcion = $cambio;
        $cambio = strtoupper($request->input('placa_vehiculo'));
        $mul->placa_vehiculo = $cambio;
        $mul->codigo_oficial = $request->input('codigo_oficial');
        $cambio = strtoupper($request->input('nombre_infractor'));
        $mul->nombre_infractor = $cambio;
        $cambio = strtoupper($request->input('nrolicencia_infractor'));
        $mul->nrolicencia_infractor = $cambio;
        $mul->tipo_licencia = $nombre;
        $mul->save();

        //Infracciones en un string
        $string = '';
        foreach($request->input('id_infraccion') as $cod_infra){
            $det = new DetalleMulta();
            $det->id_multa = $mul->id;
            $det->id_infraccion = $cod_infra;
            $det->save();
            $string .= $cod_infra.',';
        }

        //Monto Multa
        $detalle = DetalleMulta::where('id_multa', $mul->id)->pluck('id_infraccion');
        $infracciones = Infraccion::whereIn('id', $detalle)->get();
        $monto = 0;
        foreach($infracciones as $infra){
            $monto = $monto + $infra->monto;
        }

        //Nombre Oficial
        $oficial = Persona::where('codigo_oficial', $mul->codigo_oficial)->first();
        $nombre = $oficial->apellidos.', '.$oficial->nombres;

        //Bitacora
        $bita = new Bitacora();
        $bita->datos_nuevos = "Placa Vehiculo:".$mul->placa_vehiculo."Nombre Infractor:".$mul->nombre_infractor."Nro Licencia:".$mul->nrolicencia_infractor." | Oficial:".$nombre." | Descripcion:".$mul->descripcion." | Cod. Infracciones:".$string." |  Monto:".$monto;
        $bita->fecha_hora = $time;
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$MULTA_S;
        $bita->codigo_documento = $mul->id;
        $bita->save();


        //Historial
        $histo = new Historial();
        $histo->fecha_hora = $time;
        $histo->descripcion = "Identificacion de la multa ".$mul->id." Multado por el oficial:".$mul->codigo_oficial." con los siguientes codigos de infracciones:".$string." |  Monto:".$monto;
        $histo->placa_vehiculo = $mul->placa_vehiculo;
        $histo->save();

//------------------------------------------------------------------
        $car = Vehiculo::findOrFail($request->input('placa_vehiculo'));
        $telf = Telefono::where('ci_persona', $car->ci_persona)->first();

        
        if(!is_null($telf))
        {
            //Whatsapp
            $accountSidW = 'ACe8743d34f4e7efdee1f814a227321053';
            $authTokenW  = 'f041e2e695c699d7f6863aec1e387068';

            $clientW = new Client($accountSidW, $authTokenW);
            // Use the client to do fun stuff like send text messages!
            $clientW->messages->create(
            // the number you'd like to send the message to
                "whatsapp:+59174551511",
                //"whatsapp:+59171657576",
                //"whatsapp:+591".$telf->numero,
                [
                 // A Twilio phone number you purchased at twilio.com/console
                 "from" => "whatsapp:+14155238886",
                 // the body of the text message you'd like to send
                 "body" => "TRANSITO \n Informarle que fue multado bajo el vehiculo :".$mul->placa_vehiculo."\n Fecha : ".$mul->fecha_hora."\n Lista de Infracciones Cometidas : ".$string."\n Monto Total (Bs) : ".$monto."\n Oficial : ".$nombre."\n Codigo Oficial : ".$mul->codigo_oficial."\n Por favor apersonarse a la central de transito para cualquier consulta o quejas, nos encontramos en 3er Anillo Externo, Av. Santos Dumont, nuestro horario de atencion de Lun-Vier a horas de 7:00-15:00 - Telf: 3 3525669",
                ]
            );


            //SMS
            $accountSidS = 'ACde3ee253e83b63d5470d16d0ff75b795';
            $authTokenS  = '6512b3f5d9cb264f1fac2967e3f99d73';

            $clientS = new Client($accountSidS, $authTokenS);
            
                // Use the client to do fun stuff like send text messages!
                $clientS->messages->create(
                // the number you'd like to send the message to
                    //"+59170868798",
                    //"+59174551511",
                    "+591".$telf->numero,
                    //"+59171657576",
                    array(
                    // A Twilio phone number you purchased at twilio.com/console
                    "from" => "+13213845143",
                    // the body of the text message you'd like to send
                    "body" => "TRANSITO \n Informarle que fue multado bajo el vehiculo :".$mul->placa_vehiculo."\n Fecha : ".$mul->fecha_hora."\n Lista de Infracciones Cometidas : ".$string."\n Monto Total (Bs) : ".$monto."\n Oficial : ".$nombre."\n Codigo Oficial : ".$mul->codigo_oficial."\n Por favor apersonarse a la central de transito para cualquier consulta o quejas, nos encontramos en 3er Anillo Externo, Av. Santos Dumont, nuestro horario de atencion de Lun-Vier a horas de 7:00-15:00 - Telf: 3 3525669",
                    )
                );
        }else{
            $mult = Multa::findOrFail($mul->id);
            $mult->sended_sms = false;
            $mult->save();
        }
        
        
        //Email
        $data = DB::table('vehiculos')
                    ->where('placa', $mul->placa_vehiculo)
                    ->join('personas', 'vehiculos.ci_persona', '=', 'personas.ci') 
                    ->select('personas.email', 'personas.nombres')
                    ->first(); 

        if(!is_null($data->email)){
            Mail::send('mails.multa', ['mul' => $mul, 'string' => $string, 'monto' => $monto, 'nombre' => $nombre], function($mail) use ($data){
                $mail->to($data->email, $data->nombres)->subject('Multa de Transito');
            });
        }else{
            $mult = Multa::findOrFail($mul->id);
            $mult->sended_email = false;
            $mult->save();
        }

        return redirect()->route('multa.show', $mul->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multa = Multa::findOrFail($id);
        $detalle = DetalleMulta::where('id_multa', $id)->pluck('id_infraccion');
        $infracciones = Infraccion::whereIn('id', $detalle)->get();
        $nombreOficial = Persona::where('codigo_oficial', $multa->codigo_oficial)->first();
        //dd($nombreOficial);
        return view('multa.show', compact('multa', 'detalle', 'infracciones', 'nombreOficial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $multa = Multa::findOrFail($id);
        
        return view('multa.edit', compact('multa'));
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
            'descripcion' => 'required',
        ]);

        //Create register
        $mul = Multa::findOrFail($id);
        $bita = new Bitacora();
        $bita->datos_antiguos = "Descripcion:".$mul->descripcion;;
        $cambio = strtoupper($request->input('descripcion'));
        $mul->descripcion = $cambio;
        $mul->save();

        $bita->datos_nuevos = "Descripcion:".$mul->descripcion;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$MULTA_S;
        $bita->codigo_documento = $mul->id;
        $bita->save();

        return redirect()->route('multa.show', $id)->with('success', 'Multa Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mul = Multa::findOrFail($id);
        $mul->estado = true;
        $mul->save();

        $detalle = DetalleMulta::where('id_multa', $id)->get();
        $string = '';
        foreach($detalle as $det){
            $string .= $det->id_infraccion.',';
        }

        //Monto Multa
        $detalle = DetalleMulta::where('id_multa', $mul->id)->pluck('id_infraccion');
        $infracciones = Infraccion::whereIn('id', $detalle)->get();
        $monto = 0;
        foreach($infracciones as $infra){
            $monto = $monto + $infra->monto;
        }

        //Nombre Oficial
        $oficial = Persona::where('codigo_oficial', $mul->codigo_oficial)->first();
        $nombre = $oficial->apellidos.', '.$oficial->nombres;

        $bita = new Bitacora();
        $bita->datos_antiguos = "Placa Vehiculo:".$mul->placa_vehiculo."Nombre Infractor:".$mul->nombre_infractor."Nro Licencia:".$mul->nrolicencia_infractor." | Oficial:".$nombre." | Descripcion:".$mul->descripcion." | Cod. Infracciones:".$string." |  Monto:".$monto;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$MULTA_S;
        $bita->codigo_documento = $mul->id;
        $bita->save();

        return redirect()->route('multa.index')->with('success', 'Multa Cancelada Exitosamente');
    }
}
