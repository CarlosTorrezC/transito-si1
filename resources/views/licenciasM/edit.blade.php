@extends ('layouts.app')

@section ('content')
<h1>Licencia M</h1>
{!! Form::open(['route' => ['licenciasM.update', $licM->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $licM->estado, $licM->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Licencia M : {{$licM->id}}</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{ Form::checkbox('lentes', $licM->lentes, $licM->lentes==0? false:true) }}
                                            {{ Form::label('lentes', 'Check si el conductor usa lentes de contactos') }}
                                        <br>
                                            {{ Form::checkbox('audifonos', $licM->audifonos, $licM->audifonos==0? false:true) }}
                                            {{ Form::label('audifonos', 'Check si el conductor usa audifonos para la sordera') }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('ci_persona', 'CI y Nombre del portador') }}
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item">{{$licM->ci_persona}}</li>
                                                <li class="list-group-item">{{$portador->apellidos}}, {{$portador->nombres}}</li>
                                            </ul>
                                        </div>

                                        <div class="form-group">
                                            {{Form::file('cover_image')}}
                                        </div>
                                        <br>
                                        <a href="{{route('licenciasM.index')}}" class="btn btn-secondary">Cancelar</a> 
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