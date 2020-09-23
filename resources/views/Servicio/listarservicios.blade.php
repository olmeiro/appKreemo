@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>SERVICIOS</strong>
            <a href="/listachequeo" class="btn btn-outline-light float-right">LISTA DE SERVICIOS</a>
        </div>

        <div class="card-body table-responsive">
        @include('flash::message')
            <table id="tbl_servicio" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                <tr>
                    <th>id Cotizacion</th>
                    <th>id maquina</th>
                    <th>operario 1</th>
                    <th>operario 2</th>
                    <th>fecha Inicio</th>
                    <th>fecha Final</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                    <th>Realizar Encuesta</th>
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
                ajax: '/servicio/listarservicio',
                columns: [
                    {
                     data: 'idcotizacion',
                     name: 'idcotizacion',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'modelo',
                     name: 'modelo',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'n1',
                     name: 'n1',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'n2',
                     name: 'n2',
                     orderable: false,
                     searchable: false
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
                        name: 'estado'
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'encuesta',
                        name: 'encuesta',
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
