@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Historiales
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nro</th>
                                <th scope="col">Fecha Elaborado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historiales as $histo)
                                <tr>
                                    <td>{{$histo->id}}</td>
                                    <td>{{$histo->fecha_hora}}</td>
                                    <td>
                                        @can('historial.show')
                                            <a href="{{route('historial.show', $histo->id)}}" class="btn btn-outline-secondary pull-right">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('historial.edit')
                                            <a href="{{route('historial.edit', $histo->id)}}" class="btn btn-outline-warning pull-right">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('historial.detroy')
                                            {!! Form::open(['route' => ['historial.destroy', $histo->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-outline-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                   {{$historiales->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection