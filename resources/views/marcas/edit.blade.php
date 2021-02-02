@extends ('layouts.app')

@section ('content')
<h1>Modificar Marca</h1>
    {!! Form::open(['route' => ['marcas.update', $marca->id],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $marca->estado, $marca->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Editar Marca</h4>
                                    <div class="card-text">
                                        {{Form::label('marca', 'Marca')}}
                                        {{Form::text('marca', $marca->marca, ['class' => 'form-control', 'placeholder' => 'Ingrese la Marca', 
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}

                                        <br>
                                        <a href="{{route('marcas.index')}}" class="btn btn-secondary">Atras</a> 
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