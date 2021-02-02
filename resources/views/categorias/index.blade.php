@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Categorias de Licencia A
                    @can('categorias.create')
                        <a class="btn btn-primary btn-sm float-right" href="{{route('categorias.create')}}" role="button">Crear Nueva Categoria</a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="table_id">
                            <thead class="thead-dark">
                                <tr>
                                    {{--<th scope="col" width="10px"></th>--}}
                                    <th scope="col" width="15px">Nombre</th>
                                    <th scope="col" width="10px">Categoria</th>
                                    <th scope="col" width="30px">Descripcion</th>
                                    <th scope="col" width="10px">Estado</th>
                                    <th scope="col" width="10px">&nbsp;</th>
                                    <th scope="col" width="10px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria as $cate)
                                    <tr>
                                        {{--<td class="text-right"> <i class="btn btn-xs fa fa-list-ul" data-toggle="collapse" data-target=".collapsed1"></i></td>--}}
                                        <td>{{$cate->nombre}}</td>
                                        <td>{{$cate->categoria}}</td>
                                        <td>{{$cate->descripcion}}</td>
                                        <td>
                                            @if ($cate->estado == 0)
                                                <p class="card-text text-success">ACTIVO</p>
                                            @else
                                                <p class="card-text text-danger">INACTIVO</p>
                                            @endif
                                        </td>
                                        <td>
                                            @can('categorias.edit')
                                                <a href="{{route('categorias.edit', $cate->categoria)}}" class="btn btn-secondary">Editar</a> 
                                            @endcan
                                        </td>
                                        <td>
                                            @can('categorias.destroy')
                                                @if ($cate->estado == false)
                                                    {!!Form::open(['route' => ['categorias.destroy', $cate->categoria], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
                                                    {!!Form::close()!!}
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
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
            var table = $('#table_id').DataTable({
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
                }
            });
            /*$('#table_id').on('click', '.fa-list-ul', function () {
                var tr = $(this).closest('tr');

                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(*?*).show();
                    tr.addClass('shown');
                }
            });*/

        });
    </script>
@endsection