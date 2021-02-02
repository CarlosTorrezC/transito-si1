@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Nombre Auto
                    @can('nombre.create')
                        <a class="btn btn-primary btn-sm float-right" href="{{route('nombre.create')}}" role="button">Crear Nuevo Nombre</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table_id">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Estado</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marcas as $marc)
                                @foreach ($nombres as $nomb)
                                    @if ($nomb->id_marca == $marc->id)
                                        <tr>
                                            <td>{{$nomb->nombre}}</td>
                                            <td>{{$marc->marca}}</td>
                                            <td>
                                                @if ($nomb->estado == 0)
                                                    <p class="card-text text-success">ACTIVO</p>
                                                @else
                                                    <p class="card-text text-danger">INACTIVO</p>
                                                @endif
                                            </td>
                                            <td>
                                                @can('nombre.edit')
                                                    <a href="{{route('nombre.edit', $nomb->id)}}" class="btn btn-secondary">Editar</a> 
                                                @endcan
                                            </td>
                                            <td>
                                                @can('nombre.destroy')
                                                    @if ($nomb->estado == false)  
                                                        {!!Form::open(['route' => ['nombre.destroy', $nomb->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
                },
                order: [[1, 'asc']],
                rowGroup: {
                    dataSrc: 1
                }
            });
            //table.column( 1 ).visible( false );
        } );
    </script>
@endsection