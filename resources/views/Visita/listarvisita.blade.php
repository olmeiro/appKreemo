@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Visitas</strong>
        </div>
        <div class="card-body table-responsive">
        @include('flash::message')
            <table id="tbl_visita" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Tipo visita</th>
                    <th>Obra</th>
                    <th>Fecha</th>
                    <th>Hora inicio</th>
                    <th>Hora final</th>
                    <th>Descripción</th>
                    <th>Lista de chequeo</th>
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
        $('#tbl_visita').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/visita/listarvisitas',
                columns: [
                    {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false
                    },
                    {
                    data: 'tipovisita',
                    name: 'tipovisita',
                    orderable: false,
                    searchable: false
                    },
                    {
                    data: 'nombre_obra',
                    name: 'nombre_obra'
                    },
                    {
                        data: 'fecha',
                        name: 'fecha'
                    },
                    {
                        data: 'horainicio',
                        name: 'horainicio'
                    },
                    {
                        data: 'horafinal',
                        name: 'horafinal'
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'listaChequeo',
                        name: 'listaChequeo',
                        orderable: false,
                        searchable: false
                    },
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
