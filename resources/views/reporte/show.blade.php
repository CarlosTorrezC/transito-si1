@extends ('layouts.app')

@section ('content')
<h1>Visualizacion de Reporte</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 25.0rem;">

                            <div class="card-header">
                                <div class="float-right"> 
                                    @if ($report->estado == 0)
                                        <p class="text-success">ACTIVO</p>
                                    @else
                                        <p class="text-danger">INACTIVO</p>
                                    @endif
                                </div>
                                <h5 class="card-title">Nro : {{$report->id}}</h5>
                            </div>
                                <div class="card-body">

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">CI Autor del reporte :</h5>
                                        <p class="card-text">{{$report->ci_persona}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Placa Vehiculo :</h5>
                                        <p class="card-text">{{$report->placa_vehiculo}}</p>
                                    </div>
                                   
                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Descripcion :</h5>
                                        <p class="card-text">{{$report->descripcion}}</p>
                                    </div>

                                    <br>
                                        <a href="{{route('reporte.index')}}" class="btn btn-secondary">Atras</a> 
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection