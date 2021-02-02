@extends ('layouts.app')

@section ('content')
<h1>Vista Vehiculo</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group"> 
                    <div class="card bg-dark text-white" style="width: 1040px; height: 400px;">
                        <img style='width:50%; height:100%' src="/storage/app/public/cover_images/{{$vehiculo->cover_image}}" class="card-img-top rounded">
                        <div class="card-img-overlay">
                            <div class="row justify-content-end">
                                <div class="col-6">
                                    <div class="float-right">
                                        @if ($vehiculo->estado == 0)
                                            <p class="text-success">ACTIVO</p>
                                        @else
                                            <p class="text-danger">INACTIVO</p>
                                        @endif
                                    </div>
                                    <h5 class="card-title text-info">Placa : {{$vehiculo->placa}}</h5>
                                    <div class="row">
                                        <h5 class="card-title">Marca :</h5>
                                        <p class="card-text">{{$vehiculo->marca}}</p>
                                    </div>
                                   
                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="card-title">Nombre :</h5>
                                        <p class="card-text">{{$vehiculo->nombre}}</p>
                                    </div>

                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="card-title">Modelo :</h5>
                                        <p class="card-text">{{$vehiculo->modelo}}</p>
                                    </div>

                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="card-title">Color :</h5>
                                        <p class="card-text">{{$color->nombre}}</p>
                                    </div>

                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="card-title">Tipo de Vehiculo :</h5>
                                        <p class="card-text">{{$tipoV->descripcion}}</p>
                                    </div>

                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="card-title">Numero de Chasis :</h5>
                                        <p class="card-text">{{$vehiculo->nrochasis}}</p>
                                    </div>

                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="card-title">Numero de Motor :</h5>
                                        <p class="card-text">{{$vehiculo->nromotor}}</p>
                                    </div>

                                    <br>
                                    <a href="{{route('vehiculo.index')}}" class="btn btn-secondary">Atras</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                        Ver Propietario
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos del Propietario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Nombre : </h5><p>{{$propietario->apellidos}}, {{$propietario->nombres}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">CI : </h5><p>{{$propietario->ci}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Sexo : </h5><p>{{$propietario->sexo}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Nacionalidad : </h5><p>{{$propietario->nacionalidad}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Fecha de Nacimiento : </h5><p>{{$propietario->fecha_nacimiento}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Grupo Sanguineo : </h5><p>{{$propietario->grupo_sanguineo}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Direccion : </h5><p>{{$propietario->direccion}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">@Email : </h5><p>{{$propietario->email}}</p>
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;<h5 class="text-info">Telefono : </h5>
                                        @if (is_null($telf))
                                            <p class="card-text">Propietario no tiene telefono</p>
                                        @else
                                            <p class="card-text">{{$telf->numero}}</p>
                                        @endif 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
