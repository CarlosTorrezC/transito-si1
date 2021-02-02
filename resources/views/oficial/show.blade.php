@extends ('layouts.app')

@section ('content')
<h1>Oficial</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 25.0rem;">

                            <div class="card-header">
                                <div class="float-right"> 
                                    @if ($oficial->estado_oficial == 0)
                                        <p class="text-success">ACTIVO</p>
                                    @else
                                        <p class="text-danger">INACTIVO</p>
                                    @endif
                                </div>
                                <h5 class="card-title">Codigo : {{$oficial->codigo_oficial}}</h5>
                            </div>
                                <div class="card-body">

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Nombres :</h5>
                                        <p class="card-text">{{$oficial->nombres}}</p>
                                    </div>
                                   
                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Apellidos :</h5>
                                        <p class="card-text">{{$oficial->apellidos}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Sexo :</h5>
                                        <p class="card-text">{{$oficial->sexo}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Nacionalidad :</h5>
                                        <p class="card-text">{{$oficial->nacionalidad}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Fecha de Nacimiento :</h5>
                                        <p class="card-text">{{$oficial->fecha_nacimiento}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Direccion :</h5>
                                        <p class="card-text">{{$oficial->direccion}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Grupo Sanquineo :</h5>
                                        <p class="card-text">{{$oficial->grupo_sanguineo}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Email :</h5>
                                        <p class="card-text">{{$oficial->email}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Telefono :</h5>
                                        @if (is_null($telf))
                                            <p class="card-text">Oficial no tiene telefono</p>
                                        @else
                                            <p class="card-text">{{$telf->numero}}</p>
                                        @endif 
                                    </div>

                                    <br>
                                        <a href="{{route('oficial.index')}}" class="btn btn-secondary">Atras</a> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection