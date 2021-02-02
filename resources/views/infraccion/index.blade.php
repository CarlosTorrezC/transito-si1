@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Infraccion
                    @can('infraccion.create')
                        <a class="btn btn-primary btn-sm float-right" href="{{route('infraccion.create')}}" role="button">Crear Nueva Infraccion</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="table_id">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Capitulo</th>
                                <th scope="col">Estado</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($capitulos as $cap)
                                @foreach ($infra as $inf)
                                    @if ($inf->id_capitulo == $cap->id)
                                        <tr>
                                            <td>{{$inf->id}}</td>
                                            <td>{{$inf->descripcion}}</td>
                                            <td>{{$inf->monto}}</td>
                                            <td>{{$cap->nombre}}</td>
                                            <td>
                                                @if ($inf->estado == 0)
                                                    <p class="card-text text-success">ACTIVO</p>
                                                @else
                                                    <p class="card-text text-danger">INACTIVO</p>
                                                @endif
                                            </td>
                                            <td>
                                                @can('infraccion.edit')
                                                    <a href="{{route('infraccion.edit', $inf->id)}}" class="btn btn-secondary">Editar</a> 
                                                @endcan
                                            </td>
                                            <td>
                                                @can('infraccion.destroy')
                                                    @if ($inf->estado == false)
                                                        {!!Form::open(['route' => ['infraccion.destroy', $inf->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                },
                order: [[3, 'asc']],
                rowGroup: {
                    dataSrc: 3
                },
                "columnDefs": [
                    {
                        "targets": [ 3 ],
                        "visible": false,
                        "searchable": false
                    },
                ]
            });
        } );
    </script>
@endsection