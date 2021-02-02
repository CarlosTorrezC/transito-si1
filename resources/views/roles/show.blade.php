@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Rol
                </div>

                <div class="card-body">
                    <p><strong>Nombre</strong>&nbsp{{$role->name}}</p>
                    <p><strong>Slug</strong>&nbsp{{$role->slug}}</p>
                    <p><strong>Descripcion</strong>&nbsp{{$role->description}}</p>
                    <hr>
                    <a href="{{route('roles.index')}}" class="btn btn-secondary">Atras</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection