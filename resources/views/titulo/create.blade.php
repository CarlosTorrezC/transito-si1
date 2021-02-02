@extends ('layouts.app')

@section ('content')
<h1>Crear Nueva Titulo del Codigo de Transito</h1>
    {!! Form::open(['route' => 'titulos.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nuevo Titulo</h4>
                                    <div class="card-text">
                                        {{Form::label('nombre', 'Titulo')}}
                                        {{Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Titulo',
                                                                    'style' => 'text-transform:uppercase' ])}}
                                        
                                        <br>
                                        <a href="{{route('titulos.index')}}" class="btn btn-secondary">Atras</a> 
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