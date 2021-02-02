@extends ('layouts.app')

@section ('content')
<h1>Crear Nueva Infraccion</h1>
    {!! Form::open(['route' => 'infraccion.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nueva Infraccion</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('codigo', 'Codigo')}}
                                            {{Form::text('codigo', '', ['class' => 'form-control', 'placeholder' => 'Codigo'])}}
                                        </div>
                                        <div class="form-group">
                                            {{Form::label('monto', 'Monto')}}
                                            {{Form::number('monto', '', ['class' => 'form-control', 'placeholder' => 'Monto'])}}
                                        </div>
                                        <div class="form-group">
                                            {{Form::label('descripcion', 'Descripcion')}}
                                            {{Form::textarea('descripcion', '', ['class' => 'form-control', 'placeholder' => 'Descripcion',
                                                                                'maxlenght' => '255', 'rows' => 3, 'cols' => 100, 
                                                                            'style' => 'text-transform:uppercase'])}}
                                        </div>
                                        <div class="form-group">
                                            {{Form::label('id_capitulo', 'Capitulo')}}
                                            {{ Form::select('id_capitulo', $capitulos,  null, ['class' => 'form-control', 
                                                                                'placeholder' => 'Elija Capitulo']) }}
                                            <small>Elija el capitulo que le corresponde la infraccion</small>
                                        </div>
                                        
                                        <br>
                                        <a href="{{route('infraccion.index')}}" class="btn btn-secondary">Atras</a> 
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