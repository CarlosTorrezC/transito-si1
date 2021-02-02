@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Capitulos de Titulo del Codigo de Transito
                    @can('capitulos.create')
                        <a class="btn btn-primary btn-sm float-right" href="{{route('capitulos.create')}}" role="button">Crear Nuevo Capitulo</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table_id">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Capitulo</th>
                                <th scope="col">Estado</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($titulos as $tit)
                                @foreach ($capitulos as $cap)
                                    @if ($cap->id_titulo == $tit->id)
                                        <tr>
                                            <td>{{$tit->nombre}}</td>
                                            <td>{{$cap->nombre}}</td>
                                            <td>
                                                @if ($cap->estado == 0)
                                                    <p class="card-text text-success">ACTIVO</p>
                                                @else
                                                    <p class="card-text text-danger">INACTIVO</p>
                                                @endif
                                            </td>
                                            <td>
                                                @can('capitulos.edit')
                                                    <a href="{{route('capitulos.edit', $cap->id)}}" class="btn btn-secondary">Editar</a> 
                                                @endcan
                                            </td>
                                            <td>
                                                @can('capitulos.destroy')
                                                    @if ($cap->estado == false)
                                                        {!!Form::open(['route' => ['capitulos.destroy', $cap->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
                                                        {!!Form::close()!!}
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach   
                            @endforeach 
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                order: [[0, 'asc']],
                rowGroup: {
                    dataSrc: 0
                }
            });
        } );
    </script>
@endsection