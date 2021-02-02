@extends ('layouts.app')

@section ('content')
<h1>Editar Vehiculo</h1>
{!! Form::open(['route' => ['vehiculo.update', $vehiculo->placa], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $vehiculo->estado, $vehiculo->estado ==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Vehiculo : {{$vehiculo->placa}}</h4>
                                    <hr>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('ci_persona', 'Carnet de Identidad del propietario')}}
                                            {{ Form::number('ci_persona', $vehiculo->ci_persona, ['class' => 'form-control', 'placeholder' => 'CI Propietario']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('marca', 'Marca')}}
                                            <li class="list-group-item">{{$vehiculo->marca}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nombre', 'Nombre')}}
                                            <li class="list-group-item">{{$vehiculo->nombre}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('modelo', 'Modelo')}}
                                            <li class="list-group-item">{{$vehiculo->modelo}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nrochasis', 'Numero de Chasis')}}
                                            <li class="list-group-item">{{$vehiculo->nrochasis}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nromotor', 'Numero de Motor')}}
                                            <li class="list-group-item">{{$vehiculo->nromotor}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('id_tipovehiculo', 'Tipo de Vehiculo')}}
                                            <li class="list-group-item">{{$tipoVA->descripcion}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('id_color', 'Color')}}
                                            {{ Form::select('id_color', $color,  $colorA->id, ['class' => 'form-control', 'placeholder' => 'Elige el Color']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::file('cover_image')}}
                                        </div>

                                        <br>
                                        <a href="{{route('vehiculo.index')}}" class="btn btn-secondary">Cancelar</a> 
                                        {{Form::hidden('_method', 'PUT')}}
                                        {{Form::submit('Guardar Cambios', ['class' => 'btn btn-primary'])}}
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