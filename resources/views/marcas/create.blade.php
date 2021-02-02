@extends ('layouts.app')

@section ('content')
<h1>Crear Nueva Marca</h1>
    {!! Form::open(['route' => 'marcas.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nueva Marca</h4>
                                    <div class="card-text">
                                        {{Form::label('marca', 'Marca')}}
                                        {{Form::text('marca', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Marca',
                                                                    'style' => 'text-transform:uppercase' ])}}
                                        
                                        <br>
                                        <a href="{{route('marcas.index')}}" class="btn btn-secondary">Atras</a> 
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