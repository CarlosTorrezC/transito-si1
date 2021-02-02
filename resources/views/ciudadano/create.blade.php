@extends ('layouts.app')

@section ('content')
<h1>Crear Nuevo Ciudadano</h1>
    {!! Form::open(['route' => 'ciudadano.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nuevo Ciudadano</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('ci', 'CI Ciudadano')}}
                                            {{Form::number('ci', '', ['class' => 'form-control', 'placeholder' => 'CI Ciudadano'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nombres', 'Nombres')}}
                                            {{Form::text('nombres', '', ['class' => 'form-control', 'placeholder' => 'Nombres', 
                                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('apellidos', 'Apellidos')}}
                                            {{Form::text('apellidos', '', ['class' => 'form-control', 'placeholder' => 'Apellidos',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('sexo', 'Sexo')}}
                                            {{ Form::select('sexo', ['M' => 'MASCULINO', 'F' => 'FEMENINO'],  null, 
                                                                        ['class' => 'form-control', 'placeholder' => 'Elige el Sexo']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nacionalidad', 'Nacionalidad')}}
                                            {{ Form::select('nacionalidad', ['BOLIVIANA' => 'BOLIVIANA', 'EXTRANJERO' => 'EXTRANJERO'],  null, 
                                                                        ['class' => 'form-control', 'placeholder' => 'Elige la Nacionalidad']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('fecha_nacimiento', 'Fecha de Nacimiento')}}
                                            <small>Formato (mes-dia-anho)</small>
                                            {{Form::date('fecha_nacimiento', '', ['class' => 'form-control', 'placeholder' => 'Fecha de Nacimiento'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('direccion', 'Direccion')}}
                                            {{Form::text('direccion', '', ['class' => 'form-control', 'placeholder' => 'Direccion',
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('grupo_sanguineo', 'Grupo Sanquineo')}}
                                            {{ Form::select('grupo_sanguineo', ['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 
                                                                                'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-',],  null, 
                                                                        ['class' => 'form-control', 'placeholder' => 'Elige un Grupo Sanquineo']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('email', 'Email')}}
                                            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => '@ Email', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('telefono', 'Telefono')}}
                                            {{Form::number('telefono', '', ['class' => 'form-control', 'placeholder' => 'Telefono',
                                                                                'maxlength' => 10, 'autocomplete' => 'off'])}}
                                        </div>
                                        <br>
                                        <a href="{{route('ciudadano.index')}}" class="btn btn-secondary">Atras</a> 
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