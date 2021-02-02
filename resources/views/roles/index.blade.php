@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Roles
                    @can('roles.create')
                        <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary float-right">Crear Nuevo Rol</a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="table_id">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Rol</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        @can('roles.show')
                                            <a href="{{route('roles.show', $role->id)}}" class="btn btn-outline-secondary pull-right">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('roles.edit')
                                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-outline-warning pull-right">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('roles.destroy')
                                            {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-outline-danger">Eliminar</button>
                                            {!! Form::close() !!}
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
                }
            });
        } );
    </script>
@endsection