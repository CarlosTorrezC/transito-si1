@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        @if (Auth::user())
                <button id="print" class="float-right btn-primary" onclick="printpage()">Imprimir Consulta</button>
        @endif
    </div>
    <br>
    <div class="row">
        <div class="justify-content-start">
            <div class="card mb-3" style="width: 30rem;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img style='width:100%; height:100%' src="/storage/app/public/cover_images/{{$vehiculo->cover_image}}" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-info">Vehiculo</h5>
                      <p class="card-text">Placa : {{$vehiculo->placa}}</p>
                        <p class="card-text">Marca : {{$vehiculo->marca}}</p>
                        <p class="card-text">Nombre : {{$vehiculo->nombre}}</p>
                        <p class="card-text">Modelo : {{$vehiculo->modelo}}</p>
                        <p class="card-text">Color : {{$color->nombre}}</p>
                        <p class="card-text">Tipo Vehiculo : {{$tipoVehiculo->descripcion}}</p>
                        <p class="card-text">Tiene Multas :
                            @if (count($multaA) > 0)
                              <a class="text-danger">SI</a>
                            @else
                              <a class="text-success">NO</a>
                            @endif
                        </p>
                      </div>
                </div>
              </div>
            </div>
        </div>
        &nbsp; &nbsp; &nbsp;

        @if (Auth::user())
            <div class="justify-content-center">
              <div id="id1" class="card" style="width: 20rem;">
                <div class="card-header">
                    Propietario
                </div>
                <div class="card-body">
                  @if (is_null($persona))
                      <h5 class="card-title text-danger">Propietario indefinido o no se encuentra registrado</h5>
                  @else
                      <p class="card-text">CI : {{$persona->ci}}</p>
                      <p class="card-text">Nombre : {{$persona->nombres}}</p>
                      <p class="card-text">Apellido : {{$persona->apellidos}}</p>
                      <p class="card-text">Nacionalidad : {{$persona->nacionalidad}}</p>
                  @endif
                </div>
              </div>
            </div>

            &nbsp; &nbsp; &nbsp;
            <div class="justify-content-end">
              <div id="id2" class="card" style="width: 15rem;">
                <div class="card-header">
                  Seguro
                </div>
                <div class="card-body">
                  @if (is_null($seguro))
                      <h5 class="card-title text-danger">Vehiculo no tiene Seguro</h5>
                  @else
                    <h5 class="card-title text-info">Datos del Seguro</h5>
                    <p class="card-text">Empresa : {{$seguro->empresa}}</p>
                    <p class="card-text">Emision : {{$seguro->emision}}</p>
                    <p class="card-text">Vencimiento : {{$seguro->vencimiento}}</p>
                  @endif
                </div>
              </div>
            </div>
        @endif
        
    </div>
    &nbsp; &nbsp; 

    @if (Auth::user())
        <div class="row">
          <div class="justify-content-start">
            <div id="id3" class="card" style="width: 32rem;">
              <div class="card-header">
                <?php $montototal = 0;
                      $montototalP = 0; ?>
                @foreach ($multa as $mult)
                  <?php $infracciones = DB::table('detalle_multas')
                                                        ->where('id_multa', $mult->id)
                                                        ->join('infraccions', 'detalle_multas.id_infraccion', '=', 'infraccions.id')
                                                        ->select('infraccions.*')
                                                        ->get();?>
                  <?php $total = 0; 
                        $totalP = 0; ?>
                  @foreach ($infracciones as $infra)
                    @if ($mult->estado == false)
                      <?php $total += $infra->monto ?>
                    @else
                      <?php $totalP += $infra->monto ?>
                    @endif
                  @endforeach
                  <?php $montototal += $total;
                        $montototalP += $totalP; ?>
                @endforeach
                <p class="float-right text-danger">Total No Pagado : {{$montototal}} (BS. Bolivianos)</p>
                <p class="float-right text-success">Total Cancelado : {{$montototalP}} (BS. Bolivianos)</p>
                Multas
              </div>
              <div class="card-body">
                @if (!$multa->isEmpty())
                        <table class="table" id="table_id1">
                          <thead>
                            <tr>
                              <th scope="col">Multa</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Cancelado</th>
                              <th scope="col">Monto</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($multa as $mult)
                            <tr>
                                  <td>{{$mult->id}}</td>
                                  <td>{{$mult->fecha_hora}}</td>
                                  @if ($mult->estado == 0)
                                    <td class="text-danger">NO</td>
                                  @else
                                    <td class="text-success">SI</td>
                                  @endif
                                  <?php $infracciones = DB::table('detalle_multas')
                                                        ->where('id_multa', $mult->id)
                                                        ->join('infraccions', 'detalle_multas.id_infraccion', '=', 'infraccions.id')
                                                        ->select('infraccions.*')
                                                        ->get();?>
                                  <?php $total = 0; ?>
                                  @foreach ($infracciones as $infra)
                                      <?php $total += $infra->monto ?>
                                  @endforeach
                                  <td>{{$total}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                @else
                    Vehiculo no tiene multas
                @endif
              </div>
          </div>
          </div>

          &nbsp; &nbsp; &nbsp;
          <div class="justify-content-center">
              <div id="id4" class="card" style="width: 35rem;">
                  <div class="card-header">
                      Historial
                  </div>
                  <div class="card-body">
                    <table class="table" id="table_id2">
                      <thead>
                        <tr>
                          <th scope="col">Fecha</th>
                          <th scope="col">Descripcion</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($historial as $histo)
                          <tr>
                              <td>{{$histo->fecha_hora}}</td>
                              <td>{{$histo->descripcion}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
        </div>
    @endif
</div>
<br><br>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#table_id1').DataTable({
              scrollY:        300,
              deferRender:    true,
              scroller:       true,
            });
            $('#table_id2').DataTable({
              scrollY:        400,
              deferRender:    true,
              scroller:       true,
            });
            
        } );
        
         function printpage() {
            //Get the print button and put it into a variable
            var print = document.getElementById("print");
            var id1 = document.getElementById("id1");
            var id2 = document.getElementById("id2");
            //var id3 = document.getElementById("id3");
            //var id4 = document.getElementById("id4");

            //Set the button visibility to 'hidden' 
            print.style.visibility = 'hidden';
            /*id1.style.visibility = 'hidden';
            id2.style.visibility = 'hidden';*/
            id3.style.visibility = 'hidden';
            id4.style.visibility = 'hidden';

            //Print the page content
            window.print()

            //Restore button visibility
            print.style.visibility = 'visible';
            /*id1.style.visibility = 'visible';
            id2.style.visibility = 'visible';*/
            id3.style.visibility = 'visible';
            id4.style.visibility = 'visible';
        }
      </script>
@endsection