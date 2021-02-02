@extends ('layouts.app')

@section ('content')
<h1>Modificar Capitulo</h1>
    {!! Form::open(['route' => ['capitulos.update', $capitulo->id],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $capitulo->estado, $capitulo->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Editar Capitulo</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('nombre', 'Capitulo')}}
                                            {{Form::text('nombre', $capitulo->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese Capitulo',
                                                                        'style' => 'text-transform:uppercase', 'autocomplete' => 'off' ])}}
                                            <small>Nombre del capitulo</small>
                                        </div>
    
                                        <div class="form-group">
                                            {{Form::label('id_titulo', 'Titulo')}}
                                            {{ Form::select('id_titulo', $titulos,  $tituloA->id, ['class' => 'form-control', 
                                                                                'placeholder' => 'Elige el Titulo']) }}
                                            <small>Elija la titulo que le corresponde al capitulo que esta modificando</small>
                                        </div>

                                        <br>
                                        <a href="{{route('capitulos.index')}}" class="btn btn-secondary">Atras</a> 
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