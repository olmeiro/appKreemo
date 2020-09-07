@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>SERVICIOS</strong>
            <a href="/servicio/crear" class="btn btn-link">Crear Servicio</a>
            <a href="/estadoservicio" class="btn btn-link">Estados</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_servicio" style="width: 100%;" class="table table-striped table-bordered">
                <thead class="" align="center">
                <tr>
                    <th>N° Servicio</th>
                    <th>N° Cotización</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado Servicio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("scripts")
    <script>
        $('#tbl_servicio').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/servicio/listar',
                columns: [
                    {
                    data: 'id',
                    name: 'id'
                    },
                    {
                    data: 'idcotizacion',
                    name: 'idcotizacion'
                    },
                    {
                    data: 'fechainicio',
                    name: 'fechainicio'
                    },
                    {
                    data: 'fechafin',
                    name: 'fechafin'
                    },
                    {
                    data: 'estado',
                    name: 'estado',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'eliminar',
                        name: 'eliminar',
                        orderable: false,
                        searchable: false
                    }
                ],
                "language":{
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
    </script>
@endsection
