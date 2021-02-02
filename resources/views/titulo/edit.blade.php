@extends ('layouts.app')

@section ('content')
<h1>Modificar Titulo del Codigo de Transito</h1>
    {!! Form::open(['route' => ['titulos.update', $titulo->id],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $titulo->estado, $titulo->estado ==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Editar Titulo</h4>
                                    <div class="card-text">
                                        {{Form::label('nombre', 'Titulo')}}
                                        {{Form::text('nombre', $titulo->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el Titulo', 
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}

                                        <br>
                                        <a href="{{route('titulos.index')}}" class="btn btn-secondary">Atras</a> 
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