@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        @if ($user->estado == 0)
                            <p class="text-success">ACTIVO</p>
                        @else
                            <p class="text-danger">INACTIVO</p>
                        @endif
                    </div>
                   Usuario
                </div>

                <div class="card-body">
                    <p><strong>Nombre</strong>&nbsp{{$user->username}}</p>
                    <p><strong>Email</strong>&nbsp{{$email->email}}</p>
                    <p><strong>Role</strong>&nbsp{{$role->name}}</p>
                    &nbsp;
                    <a href="{{route('users.index')}}" class="btn btn-outline-secondary pull-right">Atras</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection