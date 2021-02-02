@extends ('layouts.app')

@section ('content')
<h1>Licencia A</h1>
{!! Form::open(['route' => ['licenciasA.update', $licA->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $licA->estado, $licA->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Licencia A : {{$licA->id}}</h4>

                                    <div class="form-group">
                                        <h5 class="card-title">CI y Nombre del portador :</h5>
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item">{{$licA->ci_persona}}</li>
                                            <li class="list-group-item">{{$portador->apellidos}}, {{$portador->nombres}}</li>
                                        </ul>
                                    </div>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{ Form::checkbox('lentes', $licA->lentes, $licA->lentes==0? false:true) }}
                                            {{ Form::label('lentes', 'Check si el conductor usa lentes de contactos') }}
                                        <br>
                                            {{ Form::checkbox('audifonos', $licA->audifonos, $licA->audifonos==0? false:true) }}
                                            {{ Form::label('audifonos', 'Check si el conductor usa audifonos para la sordera') }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('categoria_licencia', 'Categoria de Licencia')}}
                                            {{ Form::select('categoria_licencia', $cat,  $catA->categoria, 
                                                                        ['class' => 'form-control']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::file('cover_image')}}
                                        </div>

                                        <br>
                                        <a href="{{route('licenciasA.index')}}" class="btn btn-secondary">Cancelar</a> 
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