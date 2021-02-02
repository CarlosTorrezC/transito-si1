@extends ('layouts.app')

@section ('content')
<br>
@can('tiposvehiculos.create')
    <a class="btn btn-primary float-right" href="{{route('tiposvehiculos.create')}}" role="button">Crear Nuevo Tipo de Vehículo</a>
@endcan
<h1>Tipos de Vehiculos</h1>
<div class="container">
    <div class="centered">
        <div class="form-group">           
            @if(count($tipoV) > 0)
                <div class="row">
                    @foreach($tipoV as $tV)
                        <div class="card border-secondary" style="width: 17.3rem;">
                            <div class="card-body">
                                <h5 class="card-title">Datos del ID : {{$tV->id}}</h5>
                                <p class="card-text">Tipo Vehiculo : {{$tV->descripcion}}</p>
                                    @if ($tV->estado == 0)
                                        <p class="card-text">Estado : <a class="text-success">ACTIVO</a></p>
                                    @else
                                        <p class="card-text">Estado : <a class="text-danger">INACTIVO</a></p>
                                    @endif
                                <div class="row justify-content-around">
                                    @can('tiposvehiculos.edit')
                                        <a href="{{route('tiposvehiculos.edit', $tV->id)}}" class="btn btn-secondary">Editar</a> 
                                    @endcan
                                    @can('tiposvehiculos.destroy')
                                        @if ($tV->estado == false)
                                            {!!Form::open(['route' => ['tiposvehiculos.destroy', $tV->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        @endif
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No existe ningun tipo de vehiculo</p>
            @endif
            <br>
            {{$tipoV->links()}}
        </div>
    </div>
</div>
@endsection