@extends ('layouts.app')

@section ('content')
<h1>Editar Multa</h1>
    {!! Form::open(['route' => ['multa.update', $multa->id], 'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Actualizar Multa</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('nombre_infractor', 'Nombre Infractor')}}
                                            <li class="list-group-item">{{$multa->nombre_infractor}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nrolicencia_infractor', 'Nro Licencia y Tipo')}}
                                            <li class="list-group-item">{{$multa->nrolicencia_infractor}} , {{$multa->tipo_licencia}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('placa_vehiculo', 'Placa del Vehiculo')}}
                                            <li class="list-group-item">{{$multa->placa_vehiculo}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('codigo_oficial', 'Codigo del Oficial')}}
                                            <li class="list-group-item">{{$multa->codigo_oficial}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('descripcion', 'Descripcion')}}
                                            {{Form::textarea('descripcion', $multa->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion', 
                                                                            'style' => 'text-transform:uppercase', 'rows' => 5, 'cols' => 40])}}
                                        </div>

                                        <br>

                                        <a href="{{route('multa.index')}}" class="btn btn-secondary">Atras</a> 
                                        {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
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