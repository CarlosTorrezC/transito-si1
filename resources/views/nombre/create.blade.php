@extends ('layouts.app')

@section ('content')
<h1>Crear Nuevo Nombre de Auto</h1>
    {!! Form::open(['route' => 'nombre.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    @can('marcas.create')
                                        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                                            Crear Marca
                                        </button> 
                                    @endcan
                                    <h4 class="card-title">Nuevo Nombre</h4>
                                    <hr>
                                    <div class="form-group">
                                        {{Form::label('nombre', 'Nombre')}}
                                        {{Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre',
                                                                    'style' => 'text-transform:uppercase', 'autocomplete' => 'off' ])}}
                                        <small>Nombre del auto</small>
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('id_marca', 'Marca')}}
                                        {{ Form::select('id_marca', $marcas,  null, ['class' => 'form-control', 
                                                                            'placeholder' => 'Elige la Marca']) }}
                                                                            <small>Elija la marca que le corresponde el nombre del auto</small>
                                    </div>
                                        
                                        <br>
                                        <a href="{{route('nombre.index')}}" class="btn btn-secondary">Atras</a> 
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Formulario Marcas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'marcas.store', 'method' => 'POST', 'id' => 'modal-details']) !!}
                    <div class="form-group">
                        {{Form::label('marca', 'Marca')}}
                        {{Form::text('marca', '', ['class' => 'form-control', 'placeholder' => 'Ingrese Marca',
                                                                    'style' => 'text-transform:uppercase' ])}}
                    </div>
                {!! Form::close() !!}   
            </div>
            <div class="modal-footer">
                {{Form::submit('Guardar', ['class'=>'btn btn-primary', 'form' => 'modal-details'])}}
            </div>
        </div>
    </div>
</div>