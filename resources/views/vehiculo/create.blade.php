@extends ('layouts.app')

@section ('content')
<h1>Crear Nuevo Vehiculo</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    @can('ciudadano.create')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                                            Crear Ciudadano
                                        </button> 
                                    @endcan
                                    <h4 class="card-title">Nuevo Vehiculo</h4>
                                    <hr>
                                    <div class="card-text">
                                        {!! Form::open(['route' => 'vehiculo.store', 'enctype' => 'multipart/form-data']) !!}
                                        <div class="form-group">
                                            {{Form::label('ci_persona', 'Carnet de Identidad del propietario')}}
                                            {{ Form::number('ci_persona', '', ['class' => 'form-control', 'placeholder' => 'CI Propietario', 'autocomplete' => 'off']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('placa', 'Placa')}}
                                            {{Form::text('placa', '', ['class' => 'form-control', 'placeholder' => 'Placa', 'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        
                                        <div class="form-group">
                                            {{Form::label('marca', 'Marca')}}
                                           <select class="form-control" name="marca" id="marca">
                                            <option value="">Selecione Marca del Vehiculo</option>
                                                @foreach ($marca as $mar)
                                                    <option value="{{$mar->marca}}">{{$mar->marca}}</option>
                                                @endforeach
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nombre', 'Nombre Vehiculo')}}
                                            <select class="form-control" name="nombre" id="nombre">
                                                <option value="">Seleccione Nombre del Vehiculo</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('id_tipovehiculo', 'Tipo de Vehiculo')}}
                                            {{ Form::select('id_tipovehiculo', $tipoV,  null, ['class' => 'form-control', 'placeholder' => 'Elige el Tipo de Vehiculo']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('id_color', 'Color')}}
                                            {{ Form::select('id_color', $color,  null, ['class' => 'form-control', 'placeholder' => 'Elige el Color']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('modelo', 'Modelo')}}
                                            {{ Form::number('modelo', '', ['class' => 'form-control', 'placeholder' => 'Modelo']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nrochasis', 'Numero de Chasis')}}
                                            {{ Form::text('nrochasis', '',  ['class' => 'form-control', 'placeholder' => 'Nro Chasis', 'style' => 'text-transform:uppercase', 'autocomplete' => 'off']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nromotor', 'Numero de Motor')}}
                                            {{ Form::text('nromotor', '',  ['class' => 'form-control', 'placeholder' => 'Nro Motor', 'style' => 'text-transform:uppercase', 'autocomplete' => 'off']) }}
                                        </div>

                                        <div class="form-group">
                                            {{Form::file('cover_image')}}
                                        </div>


                                        <br>
                                        <a href="{{route('vehiculo.index')}}" class="btn btn-secondary">Atras</a> 
                                        {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
                                        {!! Form::close() !!}  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   



        <script>
            $('#marca').on('change', onSelectProjectChange);

            function onSelectProjectChange(){
                var project_id = $(this).val();

                if(!project_id)
                    $('#nombre').html('<option value="">No hay opciones</option>');
                
                //AJAX
                $.get('/api/proyecto/' + project_id + '/niveles', function(data){
                    var html_select;
                    for(var i=0; i<data.length; ++i)
                        html_select += '<option value="' + data[i].nombre + '">' + data[i].nombre + '</option>';
                    $('#nombre').html(html_select);
                });

            }
        </script>
@endsection


<!-- Modal Ciudadano-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'ciudadano.store', 'method' => 'POST', 'id' => 'modal-details']) !!}
                    <div class="form-group">
                        {{Form::label('ci', 'CI Ciudadano')}}
                        {{Form::number('ci', '', ['class' => 'form-control', 'placeholder' => 'CI Ciudadano', 'autocomplete' => 'off'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('nombres', 'Nombres')}}
                        {{Form::text('nombres', '', ['class' => 'form-control', 'placeholder' => 'Nombres', 
                                                        'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('apellidos', 'Apellidos')}}
                        {{Form::text('apellidos', '', ['class' => 'form-control', 'placeholder' => 'Apellidos',
                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('sexo', 'Sexo')}}
                        {{ Form::select('sexo', ['M' => 'MASCULINO', 'F' => 'FEMENINO'],  null, 
                                                    ['class' => 'form-control', 'placeholder' => 'Elige el Sexo']) }}
                    </div>

                    <div class="form-group">
                        {{Form::label('nacionalidad', 'Nacionalidad')}}
                        {{ Form::select('nacionalidad', ['BOLIVIANA' => 'BOLIVIANA', 'EXTRANJERO' => 'EXTRANJERO'],  null, 
                                                    ['class' => 'form-control', 'placeholder' => 'Elige la Nacionalidad']) }}
                    </div>

                    <div class="form-group">
                        {{Form::label('fecha_nacimiento', 'Fecha de Nacimiento')}}
                        <small>Formato (mes-dia-anho)</small>
                        {{Form::date('fecha_nacimiento', '', ['class' => 'form-control', 'placeholder' => 'Fecha de Nacimiento'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('direccion', 'Direccion')}}
                        {{Form::text('direccion', '', ['class' => 'form-control', 'placeholder' => 'Direccion',
                                                            'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('grupo_sanguineo', 'Grupo Sanquineo')}}
                        {{ Form::select('grupo_sanguineo', ['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 
                                                            'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-',],  null, 
                                                    ['class' => 'form-control', 'placeholder' => 'Elige un Grupo Sanquineo']) }}
                    </div>

                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => '@ Email', 'autocomplete' => 'off'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('telefono', 'Telefono')}}
                        {{Form::number('telefono', '', ['class' => 'form-control', 'placeholder' => 'Telefono',
                                                            'maxlength' => 10, 'autocomplete' => 'off'])}}
                    </div> 
                {!! Form::close() !!}   
            </div>
            <div class="modal-footer">
                {{Form::submit('Guardar', ['class'=>'btn btn-primary', 'form' => 'modal-details'])}}
            </div>
        </div>
    </div>
</div>