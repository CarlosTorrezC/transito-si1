@extends ('layouts.app')

@section ('content')
<h1>Modificar Tipo Vehicular</h1>
    {!! Form::open(['route' => ['tiposvehiculos.update', $tipoV->id],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 17.3rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Editar Tipo Vehicular</h4>
                                    <hr>
                                    <div class="form-group"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $tipoV->estado, $tipoV->estado ==0? true:false) }}
                                    </div>
                                    <div class="card-text">
                                        {{Form::label('descripcion', 'Descripcion')}}
                                        {{Form::text('descripcion', $tipoV->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion'])}}
                                        <br>
                                        <a href="{{route('tiposvehiculos.index')}}" class="btn btn-secondary">Atras</a> 
                                        {{Form::submit('Guardar Cambios', ['class'=>'btn btn-primary'])}}
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
