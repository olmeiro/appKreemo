@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Servicios</strong>
            <a href="/servicio/crear" class="btn btn-link">Crear Servicio</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_servicio" style="width: 100%;" class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Estado Servicio</th>
                    <th>N° Cotización</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
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
                    data: 'idestadoservicio',
                    name: 'idestadoservicio'
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

