@extends ('layouts.app')

@section ('content')
<h1>Crear Nueva Multa</h1>
    {!! Form::open(['route' => 'multa.store', 'method' => 'POST']) !!}
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 40.0rem;">
                            <div class="card-body">
                                    <h4 class="card-title">Nueva Multa</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            {{Form::label('nombre_infractor', 'Nombre del Infractor')}}
                                            {{Form::text('nombre_infractor', '', ['class' => 'form-control', 'placeholder' => 'Nombre Infractor', 
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('nrolicencia_infractor', 'Nro de Licencia del Infractor')}}
                                            <div class="float-right">
                                                {{'Seleccione tipo de licencia :' }}
                                                {{ Form::label('A') }}
                                                {{Form::checkbox('licenciaA',null, false, ['class' => 'check-list'])}}
                                                {{ Form::label('T') }} 
                                                {{Form::checkbox('licenciaT',null, false,  ['class' => 'check-list'])}}
                                                {{ Form::label('M') }} 
                                                {{Form::checkbox('licenciaM',null, false,  ['class' => 'check-list'])}}
                                            </div>
                                            {{Form::text('nrolicencia_infractor', '', ['class' => 'form-control', 'placeholder' => 'Nro Licencia', 
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                            <small>Ingrese el CI del Infractor</small>
                                        </div>


                                        <div class="form-group">
                                            {{Form::label('placa_vehiculo', 'Placa del Vehiculo')}}
                                            {{Form::text('placa_vehiculo', '', ['class' => 'form-control', 'placeholder' => 'Placa', 
                                                                                'style' => 'text-transform:uppercase', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('codigo_oficial', 'Codigo del Oficial')}}
                                            {{Form::text('codigo_oficial', '', ['class' => 'form-control', 'placeholder' => 'Codigo del Oficial', 'autocomplete' => 'off'])}}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('descripcion', 'Descripcion')}}
                                            {{Form::textarea('descripcion', '', ['class' => 'form-control', 'placeholder' => 'Descripcion', 
                                                                            'style' => 'text-transform:uppercase', 'rows' => 5, 'cols' => 40])}}
                                        </div>
                                        

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
                                            Seleccionar Infracciones
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Infracciones</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <nav id="navbar-example3" class="navbar navbar-light bg-light">
                                                                    <nav class="nav nav-pills flex-column">
                                                                        @foreach ($titulo as $tit)
                                                                            <a class="nav-link text-danger" href="#item-{{$tit->id}}">{{$tit->id}}. {{$tit->nombre}}</a>
                                                                            <?php $count = 1; ?> 
                                                                            @foreach ($capitulo as $cap)
                                                                                <nav class="nav nav-pills flex-column">
                                                                                    @if ($cap->id_titulo == $tit->id)
                                                                                        <a class="nav-link ml-3 my-1" href="#item-{{$tit->id}}-{{$count}}">{{$tit->id}}-{{$count}}. {{$cap->nombre}}</a>
                                                                                        <?php $count++; ?>
                                                                                    @endif
                                                                                </nav>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </nav>
                                                                </nav>
                                                            </div>
                                                            <div class="col-8">

                                                                <div data-spy="scrollable" data-target="#navbar-example3" data-offset="0">
                                                                    @foreach ($titulo as $tit)
                                                                        <h5 class="text-danger" id="item-{{$tit->id}}">{{$tit->id}}. {{$tit->nombre}}</h5>
                                                                        <?php $count = 1; ?> 
                                                                        @foreach ($capitulo as $cap)
                                                                            @if ($cap->id_titulo == $tit->id)
                                                                                <h6 class="text-primary" id="item-{{$tit->id}}-{{$count}}">{{$tit->id}}-{{$count}}. {{$cap->nombre}}</h6>
                                                                                
                                                                                    <table class="table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th scope="col">Articulo</th>
                                                                                            <th scope="col">Descripcion</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            @foreach ($infracciones as $infra)
                                                                                                @if ($infra->id_capitulo == $cap->id)
                                                                                                    <tr>
                                                                                                        <td>{{ Form::checkbox('id_infraccion[]', $infra->id ) }}</td>
                                                                                                        <td>{{ $infra->id }}</td>
                                                                                                        <td>{{ $infra->descripcion }}</td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                <?php $count++; ?>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Afirmar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <a href="{{route('multa.index')}}" class="btn btn-secondary">Atras</a> 
                                        {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <script type="text/javascript">
            $('.check-list').on('change', function() {
                $('.check-list').not(this).prop('checked', false);  
            });
        </script>
    {!! Form::close() !!}   
@endsection