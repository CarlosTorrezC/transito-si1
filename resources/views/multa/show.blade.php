@extends ('layouts.app')

@section ('content')
<h1 id="title">Vista de Multa</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group"> 
                    <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-header">
                                <p class="float-right text-danger">Nro.- {{$multa->id}}</p>
                                <p class="font-weight-bold">
                                    <img src="/storage/app/public/cover_images/LogoAct.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                    Transito Boliviana
                                </p>
                                <label>Fecha y Hora : {{$multa->fecha_hora}}</label>
                            </div>
                            <div class="card-body">
                                <form>
                                    <p class="font-weight-bold">Boleta de Infraccion</p>
                                    <div class="form-group">
                                        <label>Nombre Infractor</label>
                                        {{Form::text('nombre_infractor', $multa->nombre_infractor, ['class' => 'form-control', 'placeholder' => 'Infractor', 
                                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label>Nro Licencia</label>
                                          {{Form::text('nrolicencia_infractor', $multa->nrolicencia_infractor, ['class' => 'form-control', 'placeholder' => 'Licencia', 
                                                                              'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Tipo de Licencia</label>
                                          {{Form::text('tipo_licencia', $multa->tipo_licencia, ['class' => 'form-control', 'placeholder' => 'Tipo', 
                                                                              'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                        </div>
                                    </div>
                                    <?php $string = $nombreOficial->apellidos.', '; ?>
                                    <?php $string .= $nombreOficial->nombres ?>
                                    <div class="form-group">
                                        <label>Nombre Oficial</label>
                                        {{Form::text('nombre_infractor', $string, ['class' => 'form-control', 'placeholder' => 'Infractor', 
                                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label>Codigo del Oficial</label>
                                          {{Form::text('nombre_infractor', $multa->codigo_oficial, ['class' => 'form-control', 'placeholder' => 'Codigo', 
                                                                              'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Placa</label>
                                          {{Form::text('placa_vehiculo', $multa->placa_vehiculo, ['class' => 'form-control', 'placeholder' => 'Placa', 
                                                                              'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Descripcion</label>
                                      {{Form::textarea('descripcion', $multa->descripcion, ['class' => 'form-control', 'placeholder' => 'Tipo', 
                                                                              'style' => 'text-transform:uppercase', 'autocomplete' => 'off', 'readonly'])}}
                                    </div>
                                    <p class="font-weight-bold">Infracciones:</p>
                                    <div class="form-group">
                                        <ul class="list-group">
                                            <?php $total = 0; ?>
                                            @foreach ($infracciones as $infra)
                                                <div class="form-group">
                                                    <li style="width:500px" class="list-group-item">
                                                        <label>Codigo de Infraccion : {{$infra->id}}</label>
                                                        <br>
                                                        {{$infra->descripcion}}
                                                        <br>
                                                        <a class="font-weight-normal text-info">Monto en BS (bolivianos)= {{$infra->monto}}</a>
                                                        <?php $total += $infra->monto ?>
                                                    </li>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a class="font-weight-bolder text-danger float-right">Monto Total : {{$total}} Bs(bolivianos) </a> 
                                  </form>
                            </div>
                            <div style="width:550px" class="card-footer text-muted">
                                <p>Por favor apersonarse a la central de transito para cualquier consulta o quejas, nos encontramos en 3er Anillo Externo, Av. Santos Dumont, nuestro horario de atencion de Lunes a Viernes a horas de 7:00-15:00 - Telf: 3 3525669</p>
                                <div id="info">
                                    <p> Notificado por SMS :
                                    @if($multa->sended_sms == true)
                                        VERDADERO
                                    @else
                                        FALSO
                                    @endif
                                    </p>
                                    <p> Notificado por EMAIL :
                                    @if($multa->sended_email == true)
                                        VERDADERO
                                    @else
                                        FALSO
                                    @endif
                                    </p>
                                </div>
                                <button id="print" class="float-right btn-primary" onclick="printpage()">Imprimir Boleta</button>
                                <a id="back" href="{{route('multa.index')}}" class="btn btn-secondary">Atras</a> 
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection

@section('scripts')
    <script>
        function printpage() {
            //Get the print button and put it into a variable
            var title = document.getElementById("title");
            var printButton = document.getElementById("print");
            var backButton = document.getElementById("back");

            //Set the button visibility to 'hidden' 
            title.style.visibility = 'hidden';
            printButton.style.visibility = 'hidden';
            backButton.style.visibility = 'hidden';

            //Print the page content
            window.print()

            //Restore button visibility
            title.style.visibility = 'visible';
            printButton.style.visibility = 'visible';
            backButton.style.visibility = 'visible';
        }
    </script>
@endsection
