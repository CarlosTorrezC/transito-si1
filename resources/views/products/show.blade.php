@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Producto
                </div>

                <div class="card-body">
                    <p><strong>Nombre</strong>&nbsp{{$product->name}}</p>
                    <p><strong>Descripcion</strong>&nbsp{{$product->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection