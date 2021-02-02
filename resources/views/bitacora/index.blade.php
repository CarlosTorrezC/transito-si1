@extends ('layouts.app')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card w-100">
                <div class="card-header">
                    Bitacora
                </div>

                <div class="card-body">
                    <table class="table table-sm table-striped table-hover" style="width: 100%" id="table_id">
                        @if (count($bitacora) > 0)
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 10%">Usuario</th>
                                    <th style="width: 10%">Fecha</th>
                                    <th style="width: 5%">Modulo</th>
                                    <th style="width: 5%">Documento</th>
                                    <th style="width: 20%">Old Data</th>
                                    <th style="width: 20%">New Data</th>
                                    <th style="width: 10%">Operacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bitacora as $bita)
                                    <tr>
                                        <td style="width: 15%">{{$bita->username}}</td>
                                        <td style="width: 10%">{{$bita->fecha_hora}}</td>
                                        <td style="width: 10%">{{$bita->modulo}}</td>
                                        <td style="width: 10%">{{$bita->codigo_documento}}</td>
                                        <td style="width: 20%">{{$bita->datos_antiguos}}</td>
                                        <td style="width: 20%">{{$bita->datos_nuevos}}</td>
                                        <td style="width: 10%">{{$bita->operacion}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <p>Bitacora Vacia</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $.extend( true, $.fn.dataTable.defaults, {
            "ordering": false
        } );

        $(document).ready( function () {

            var currentdate = new Date();
            var datetime = "Fecha y Hora : " + currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear() + " - " 
                + currentdate.getHours() + ":" 
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();

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
                responsive: "true",
                dom: 'Bfrtilp',       
                buttons:[ 
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success',
                        messageTop: datetime,
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        messageTop: datetime,
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        messageTop: datetime,
                    },
                ],  
            });

            //Creamos una fila en el head de la tabla y lo clonamos para cada columna
            $('#table_id thead tr').clone(true).appendTo( '#table_id thead' );
                $('#table_id thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text(); //es el nombre de la columna
                    if(title == 'ID'){
                        $(this).html( '' );
                    }
                    if(title == 'Usuario'){
                        $(this).html( '<input type="text" size="10">' );
                    }
                    if(title == 'Fecha'){
                        $(this).html( '' );
                    }
                    if(title == 'Modulo'){
                        $(this).html( '<input type="text" size="10">' );
                    }
                    if(title == 'Documento'){
                        $(this).html( '<input type="text" size="10">' );
                    }
                    if(title == 'Old Data'){
                        $(this).html( '' );
                    }
                    if(title == 'New Data'){
                        $(this).html( '' );
                    }
                    if(title == 'Operacion'){
                        $(this).html( '<input type="text" size="10">' );
                    }

                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                            .column(i)
                            .search( this.value )
                            .draw();
                        }
                    } );
            } ); 
        } );  
    </script>
@endsection