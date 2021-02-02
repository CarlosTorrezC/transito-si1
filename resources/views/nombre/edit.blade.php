@extends ('layouts.app')

@section ('content')
<h1>Modificar Nombre</h1>
    {!! Form::open(['route' => ['nombre.update', $nombre->id],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $nombre->estado, $nombre->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Editar Nombre</h4>
                                    <hr>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('nombre', 'Nombre')}}
                                            {{Form::text('nombre', $nombre->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre',
                                                                        'style' => 'text-transform:uppercase', 'autocomplete' => 'off' ])}}
                                            <small>Nombre del auto</small>
                                        </div>
    
                                        <div class="form-group">
                                            {{Form::label('id_marca', 'Marca')}}
                                            {{ Form::select('id_marca', $marcas,  $marcaA->id, ['class' => 'form-control', 
                                                                                'placeholder' => 'Elige la Marca']) }}
                                            <small>Elija la marca que le corresponde el nombre del auto</small>
                                        </div>

                                        <br>
                                        <a href="{{route('nombre.index')}}" class="btn btn-secondary">Atras</a> 
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