@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Seguros
                    @can('seguro.create')
                        <a class="btn btn-sm btn-primary float-right" href="{{route('seguro.create')}}">Crear Nuevo Seguro</a>    
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="table_id">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nro Seguro</th>
                                <th scope="col">Fecha Emision</th>
                                <th scope="col">Fecha Vencimiento</th>
                                <th scope="col">Estado</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                                <th scope="col" width="10px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seguros as $seguro)
                                <tr>
                                    <td>{{$seguro->id}}</td>
                                    <td>{{$seguro->emision}}</td>
                                    <td>{{$seguro->vencimiento}}</td>
                                    <td>
                                        @if ($seguro->estado == 0)
                                            <p class="card-text text-success">ACTIVO</p>
                                        @else
                                            <p class="card-text text-danger">INACTIVO</p>
                                        @endif
                                    </td>
                                    <td>
                                        @can('seguro.show')
                                            <a href="{{route('seguro.show', $seguro->id)}}" class="btn btn-outline-secondary pull-right">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('seguro.edit')
                                            <a href="{{route('seguro.edit', $seguro->id)}}" class="btn btn-outline-warning pull-right">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('seguro.destroy')
                                            @if ($seguro->estado == false)
                                                {!! Form::open(['route' => ['seguro.destroy', $seguro->id], 'method' => 'DELETE']) !!}
                                                    <button class="btn btn-outline-danger">Eliminar</button>
                                                {!! Form::close() !!}
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