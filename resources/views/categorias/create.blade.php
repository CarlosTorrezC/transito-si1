@extends ('layouts.app')

@section ('content')
<h1>Crear Nueva Categoria</h1>
    {!! Form::open(['route' => 'categorias.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nueva Categoria</h4>
                                    <div class="card-text">
                                        {{Form::label('categoria', 'Categoria')}}
                                        {{Form::text('categoria', '', ['class' => 'form-control', 'placeholder' => 'Categoria', 
                                                                        'style' => 'text-transform:uppercase'])}}
                                        
                                        {{Form::label('nombre', 'Nombre')}}
                                        {{Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => 'Nombre'])}}
                                        
                                        {{Form::label('descripcion', 'Descripcion')}}
                                        {{Form::textarea('descripcion', '', ['class' => 'form-control', 'placeholder' => 'Descripcion',
                                                                                'maxlenght' => '255', 'rows' => 3, 'cols' => 100])}}
                                        
                                        <br>
                                        <a href="{{route('categorias.index')}}" class="btn btn-secondary">Atras</a> 
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