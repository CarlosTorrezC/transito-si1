@extends ('layouts.app')

@section ('content')
<h1>Crear Nuevo Seguro</h1>
    {!! Form::open(['route' => 'seguro.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nuevo Seguro</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('empresa', 'Empresa Aseguradora')}}
                                            {{Form::text('empresa', '', ['class' => 'form-control', 'placeholder' => 'Empresa',
                                                                           'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('placa_vehiculo', 'Placa del Vehiculo')}}
                                            {{Form::text('placa_vehiculo', '', ['class' => 'form-control', 'placeholder' => 'Placa Vehiculo',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('emision', 'Fecha Emision')}}
                                            <small>Formato (mes-dia-anho)</small>
                                            {{Form::date('emision', '', ['class' => 'form-control', 'placeholder' => 'Fecha Emision'])}}
                                        </div>

                                        <br>
                                        <a href="{{route('seguro.index')}}" class="btn btn-secondary">Cancelar</a> 
                                        {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    {!! Form::close() !!}   
@endsection