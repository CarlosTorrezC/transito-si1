@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                        Crear Oficial
                    </button> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codigo_oficial" class="col-md-4 col-form-label text-md-right">{{ __('Codigo del oficial') }}</label>

                            <div class="col-md-6">
                                <input id="codigo_oficial" type="text" class="form-control @error('codigo_oficial') is-invalid @enderror" name="codigo_oficial"  value="{{ old('codigo_oficial') }}" required autocomplete="codigo_oficial">

                                @error('codigo_oficial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        @php( $roles = Caffeinated\Shinobi\Models\Role::get())

                        <h3>Seleccione un Rol</h3>
                        <div class="form-check">
                            <ul class="list-unstyled">
                                @foreach ($roles as $rol)
                                    <li>
                                        <label>
                                            <input class="form-check-input" type="radio" value='{{$rol->id}}' id="role[]" name="roles[]">
                                            {{$rol->name}}
                                            <em>({{$rol->description ?: 'N/A'}})</em>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="d-flex justify-content-around">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a> 
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'oficial.store', 'method' => 'POST', 'id' => 'modal-details']) !!}
                    <div class="form-group">
                        {{Form::label('codigo_oficial', 'Codigo del Oficial')}}
                        {{Form::text('codigo_oficial', '', ['class' => 'form-control', 'placeholder' => 'Codigo Oficial', 'autocomplete' => 'off'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('ci', 'CI Oficial')}}
                        {{Form::number('ci', '', ['class' => 'form-control', 'placeholder' => 'CI Oficial'])}}
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
                                                            'maxlength' => 10])}}
                    </div>
                {!! Form::close() !!}   
            </div>
            <div class="modal-footer">
                {{Form::submit('Guardar', ['class'=>'btn btn-primary', 'form' => 'modal-details'])}}
            </div>
        </div>
    </div>
</div>