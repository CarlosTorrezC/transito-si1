@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Usuario
                </div>

                <div class="card-body">
                    <div class="form-group float-right"> 
                        {{ Form::label('estado', 'Estado  ') }}
                        <small>(Activo o Inactivo)</small>
                        {{ Form::checkbox('estado', $user->estado, $user->estado ==0? true:false) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del Usuario') }}
                        {{ Form::text('name', $user->username, ['class' => 'form-control']) }}
                    </div>
                    
                        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                            @include('users.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection