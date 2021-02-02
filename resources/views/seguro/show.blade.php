@extends ('layouts.app')

@section ('content')
<h1>Visualizacion de Seguro</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group">  
                    <div class="row justify-content-center">
                        <div class="card border-primary" style="width: 25.0rem;">

                            <div class="card-header">
                                <div class="float-right">
                                    @if ($seguros->estado == 0)
                                        <p class="text-success">ACTIVO</p>
                                    @else
                                        <p class="text-danger">INACTIVO</p>
                                    @endif
                                </div>
                                <h5 class="card-title">Nro : {{$seguros->id}}</h5>
                            </div>
                                <div class="card-body">

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Placa del vehiculo :</h5>
                                        <p class="card-text">{{$seguros->placa_vehiculo}}</p>
                                    </div>

                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Empresa :</h5>
                                        <p class="card-text">{{$seguros->empresa}}</p>
                                    </div>
                                   
                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Emision :</h5>
                                        <p class="card-text">{{$seguros->emision}}</p>
                                    </div>
                                    <div class="row justify-content-start">
                                        <h5 class="card-title">Vencimiento :</h5>
                                        <p class="card-text">{{$seguros->vencimiento}}</p>
                                    </div>

                                    <br>
                                    
                                        <a href="{{route('seguro.index')}}" class="btn btn-secondary">Atras</a> 
                                        
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection