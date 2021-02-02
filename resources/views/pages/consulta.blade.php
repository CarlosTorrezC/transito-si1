@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
            {!! Form::open(['action' => 'PagesController@resultados', 'method' => 'GET', 'role' => 'search']) !!}
                <div class="card" style="width: 30rem;">
                    <h5 class="card-header">Consulta de Licencias</h5>
                    <div class="card-body">
                        <p class="card-text">Ingrese el carnet de identidad del portador que desea consultar</p>
                        {{Form::number('licencia', '', ['class' => 'form-control', 'placeholder' => 'CI', 'autocomplete' => 'off'])}}
                    </div>
        
                    {{Form::submit('Buscar', ['class'=>'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}
    </div>
@endsection