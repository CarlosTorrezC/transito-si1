@extends ('layouts.app')

@section ('content')
<h1>Ciudadano</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 25.0rem;">

                            <div class="card-header">
                                <div class="float-right"> 
                                    @if ($ciudadano->estado_ciudadano == 0)
                                        <p class="text-success">ACTIVO</p>
                                    @else
                                        <p class="text-danger">INACTIVO</p>
                                    @endif
                                </div>
                                <h5 class="card-title">Ciudadano : {{$ciudadano->ci}}</h5>
                            </div>
                            
                                <div class="card-body">

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Nombres :</h5>
                                        <p class="card-text">{{$ciudadano->nombres}}</p>
                                    </div>
                                   
                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Apellidos :</h5>
                                        <p class="card-text">{{$ciudadano->apellidos}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Sexo :</h5>
                                        <p class="card-text">{{$ciudadano->sexo}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Nacionalidad :</h5>
                                        <p class="card-text">{{$ciudadano->nacionalidad}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Fecha de Nacimiento :</h5>
                                        <p class="card-text">{{$ciudadano->fecha_nacimiento}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Direccion :</h5>
                                        <p class="card-text">{{$ciudadano->direccion}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Grupo Sanguineo :</h5>
                                        <p class="card_text">{{$ciudadano->grupo_sanguineo}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Email :</h5>
                                        <p class="card-text">{{$ciudadano->email}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Telefono :</h5>
                                        @if (is_null($telf))
                                            <p class="card-text">Ciudadano no tiene telefono</p>
                                        @else
                                            <p class="card-text">{{$telf->numero}}</p>
                                        @endif 
                                    </div>

                                    <br>
                                        <a href="{{route('ciudadano.index')}}" class="btn btn-secondary">Atras</a> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection