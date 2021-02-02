@extends ('layouts.app')

@section ('content')
<br>
<h1>Crear Nuevo Tipo Vehicular</h1>
    {!! Form::open(['route' => 'tiposvehiculos.store']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 17.3rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nuevo Tipo Vehicular</h4>
                                    <div class="card-text">
                                        {{Form::label('descripcion', 'Descripcion')}}
                                        {{Form::text('descripcion', '', ['class' => 'form-control', 'placeholder' => 'Descripcion'])}}
                                        <br>
                                        <a href="{{route('tiposvehiculos.index')}}" class="btn btn-secondary">Atras</a> 
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


