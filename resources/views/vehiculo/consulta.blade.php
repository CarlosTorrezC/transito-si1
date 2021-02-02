@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
            {!! Form::open(['action' => 'VehiculosController@resultados', 'method' => 'GET', 'role' => 'search']) !!}
                <div class="card" style="width: 30rem;">
                    <h5 class="card-header">Consulta de Vehiculo</h5>
                    <div class="card-body">
                        <p class="card-text">Ingrese la placa del vehiculo que desea consultar</p>
                        {{Form::text('placa', '', ['class' => 'form-control', 'placeholder' => 'Placa', 'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                    </div>
        
                    {{Form::submit('Buscar', ['class'=>'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}
    </div>
@endsection