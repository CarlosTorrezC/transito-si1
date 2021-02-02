@extends ('layouts.app')

@section ('content')
<h1>Oficial</h1>
{!! Form::open(['route' => ['oficial.update', $oficial->ci], 'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado_oficial', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado_oficial', $oficial->estado_oficial, $oficial->estado_oficial==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Codigo : {{$oficial->ci}}</h4>
                                    <hr>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('nombres', 'Nombres')}}
                                            {{Form::text('nombres', $oficial->nombres, ['class' => 'form-control', 'placeholder' => 'Nombres', 
                                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('apellidos', 'Apellidos')}}
                                            {{Form::text('apellidos', $oficial->apellidos, ['class' => 'form-control', 'placeholder' => 'Apellidos',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('sexo', 'Sexo')}}
                                            <li class="list-group-item">{{$oficial->sexo}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nacionalidad', 'Nacionalidad')}}
                                            {{ Form::select('nacionalidad', ['BOLIVIANA' => 'BOLIVIANA', 'EXTRANJERO' => 'EXTRANJERO'],  $oficial->nacionalidad, 
                                                                        ['class' => 'form-control', 'placeholder' => 'Elige la Nacionalidad']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('fecha_nacimiento', 'Fecha de Nacimiento')}}
                                            <small>Formato (anho-mes-dia)</small>
                                            <li class="list-group-item">{{$oficial->fecha_nacimiento}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('direccion', 'Direccion')}}
                                            {{Form::text('direccion', $oficial->direccion, ['class' => 'form-control', 'placeholder' => 'Direccion',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('grupo_sanguineo', 'Grupo Sanquineo')}}
                                            <li class="list-group-item">{{$oficial->grupo_sanguineo}}</li>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('email', 'Email')}}
                                            {{Form::email('email', $oficial->email, ['class' => 'form-control', 'placeholder' => '@ Email'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('telefono', 'Telfono')}}
                                            @if (is_null($telf))
                                                {{Form::number('telefono', null , ['class' => 'form-control', 'placeholder' => 'Oficial no tiene telefono'])}}
                                            @else
                                                {{Form::number('telefono', $telf->numero, ['class' => 'form-control', 'placeholder' => 'Telefono',  'maxlength' => 10])}}
                                            @endif
                                        </div>
                                        <br>
                                        <a href="{{route('oficial.index')}}" class="btn btn-secondary">Cancelar</a> 
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