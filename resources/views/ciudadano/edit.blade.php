@extends ('layouts.app')

@section ('content')
<h1>Ciudadano</h1>
{!! Form::open(['route' => ['ciudadano.update', $ciudadano->ci], 'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado_ciudadano', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado_ciudadano', $ciudadano->estado_ciudadano, $ciudadano->estado_ciudadano==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Ciudadano : {{$ciudadano->ci}}</h4>   
                                    <hr>                                 
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('nombres', 'Nombres')}}
                                            {{Form::text('nombres', $ciudadano->nombres, ['class' => 'form-control', 'placeholder' => 'Nombres', 
                                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('apellidos', 'Apellidos')}}
                                            {{Form::text('apellidos', $ciudadano->apellidos, ['class' => 'form-control', 'placeholder' => 'Apellidos',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('sexo', 'Sexo')}}
                                            <li class="list-group-item">{{$ciudadano->sexo}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nacionalidad', 'Nacionalidad')}}
                                            {{ Form::select('nacionalidad', ['BOLIVIANA' => 'BOLIVIANA', 'EXTRANJERO' => 'EXTRANJERO'],  $ciudadano->nacionalidad, 
                                                                        ['class' => 'form-control']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('fecha_nacimiento', 'Fecha de Nacimiento')}}
                                            <small>Formato (anho-mes-dia)</small>
                                            <li class="list-group-item">{{$ciudadano->fecha_nacimiento}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('direccion', 'Direccion')}}
                                            {{Form::text('direccion', $ciudadano->direccion, ['class' => 'form-control', 'placeholder' => 'Direccion',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('grupo_sanguineo', 'Grupo Sanquineo')}}
                                            <li class="list-group-item">{{$ciudadano->grupo_sanguineo}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('email', 'Email')}}
                                            {{Form::email('email', $ciudadano->email, ['class' => 'form-control', 'placeholder' => '@ Email', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('telefono', 'Telefono')}}
                                            @if (is_null($telf))
                                                {{Form::number('telefono', null , ['class' => 'form-control', 'placeholder' => 'Oficial no tiene telefono'])}}
                                            @else
                                                {{Form::number('telefono', $telf->numero, ['class' => 'form-control', 'placeholder' => 'Telefono',  'maxlength' => 10])}}
                                            @endif
                                        </div>
                                        <br>
                                        <a href="{{route('ciudadano.index')}}" class="btn btn-secondary">Cancelar</a> 
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