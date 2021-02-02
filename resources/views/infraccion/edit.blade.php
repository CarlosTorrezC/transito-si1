@extends ('layouts.app')

@section ('content')
<h1>Modificar Infraccion</h1>
    {!! Form::open(['route' => ['infraccion.update', $infra->id],'method' => 'PUT']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-warning" style="width: 40.0rem;">
                            <div class="card-body">
                                    <div class="form-group float-right"> 
                                        {{ Form::label('estado', 'Estado  ') }}
                                        <small>(Activo o Inactivo)</small>
                                        {{ Form::checkbox('estado', $infra->estado, $infra->estado==0? true:false) }}
                                    </div>
                                    <h4 class="card-title">Editar Infraccion</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('monto', 'Monto')}}
                                            {{Form::number('monto', $infra->monto, ['class' => 'form-control', 'placeholder' => 'Monto'])}}
                                        </div>
                                        <div class="form-group">
                                        {{Form::label('descripcion', 'Descripcion')}}
                                        {{Form::textarea('descripcion', $infra->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion',
                                                                                                'style' => 'text-transform:uppercase',
                                                                                                'maxlenght' => '255', 'rows' => 3, 'cols' => 100])}}
                                        </div>
                                        <div class="form-group">
                                            {{Form::label('id_capitulo', 'Capitulo')}}
                                            {{ Form::select('id_capitulo', $capitulos,  $capituloA->id, ['class' => 'form-control', 
                                                                                'placeholder' => 'Elija Capitulo']) }}
                                            <small>Elija el capitulo que le corresponde la infraccion</small>
                                        </div>
                                        <br>
                                        <a href="{{route('infraccion.index')}}" class="btn btn-secondary">Atras</a> 
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