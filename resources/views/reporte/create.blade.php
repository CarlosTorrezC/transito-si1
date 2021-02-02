@extends ('layouts.app')

@section ('content')
<h1>Crear Nuevo Reporte</h1>
    {!! Form::open(['route' => 'reporte.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nuevo Reporte</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('ci_persona', 'Carnet de Identidad de la persona quien reporta')}}
                                            {{Form::number('ci_persona', '', ['class' => 'form-control', 'placeholder' => 'CI', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('placa_vehiculo', 'Placa del Vehiculo')}}
                                            {{Form::text('placa_vehiculo', '', ['class' => 'form-control', 'placeholder' => 'Placa Vehiculo',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('descripcion', 'Descripcion')}}
                                            {{Form::textarea('descripcion', '', ['class' => 'form-control', 'placeholder' => 'Descripcion',
                                                                                    'style' => 'text-transform:uppercase'])}}
                                        </div>

                                        <br>
                                        <a href="{{route('reporte.index')}}" class="btn btn-secondary">Atras</a> 
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