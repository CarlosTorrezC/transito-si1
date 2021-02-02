@extends ('layouts.app')

@section ('content')
<h1>Historial</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 25.0rem;">

                            <div class="card-header">
                                <h5 class="card-title">Nro : {{$historial->id}}</h5>
                            </div>
                                <div class="card-body">

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Placa Vehiculo :</h5>
                                        <p class="card-text">{{$historial->placa_vehiculo}}</p>
                                    </div>
                                   
                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Descripcion :</h5>
                                        <p class="card-text">{{$historial->descripcion}}</p>
                                    </div>

                                    <br>
                                        <a href="{{route('historial.index')}}" class="btn btn-secondary">Atras</a> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection