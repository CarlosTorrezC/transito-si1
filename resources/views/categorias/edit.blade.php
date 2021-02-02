@extends ('layouts.app')

@section ('content')
<h1>Modificar Categoria</h1>
    {!! Form::open(['route' => ['categorias.update', $categoria->categoria],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $categoria->estado, $categoria->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Editar Categoria</h4>
                                    <div class="card-text">
                                        {{Form::label('categoria', 'Categoria')}}
                                        {{Form::text('categoria', $categoria->categoria, ['class' => 'form-control', 'placeholder' => 'Categoria',
                                                                                            'style' => 'text-transform:uppercase'])}}

                                        {{Form::label('nombre', 'Nombre')}}
                                        {{Form::text('nombre', $categoria->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre'])}}

                                        {{Form::label('descripcion', 'Descripcion')}}
                                        {{Form::textarea('descripcion', $categoria->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion',
                                                                                                    'maxlenght' => '255', 'rows' => 3, 'cols' => 100])}}
                                        <br>
                                        <a href="{{route('categorias.index')}}" class="btn btn-secondary">Atras</a> 
                                        {{Form::submit('Guardar Cambios', ['class'=>'btn btn-primary'])}}
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