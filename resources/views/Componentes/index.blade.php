@extends('layouts.app')

@section('body')

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>ETAPAS</strong>
            </div>
            <div class="card-body">
                @include('flash::message')
                <table id="tbl_etapa" class="table table-bordered table-striped " style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Etapa N°</th>
                        <th>Etapa</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header text-white " style="background-color: #616A6B">
                <strong>JORNADAS</strong>
            </div>
            <div class="card-body">
                @include('flash::message')
                <table id="tbl_jornada" class="table table-bordered" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Jornada N°</th>
                        <th>Jornada</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>MODALIDAD</strong>
            </div>
            <div class="card-body">
                @include('flash::message')
                <table id="tbl_modalidad" class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Modalidad N°</th>
                        <th>Modalidad</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>TIPO DE CONCRETOS</strong>
            </div>
            <div class="card-body">
                @include('flash::message')
                <table id="tbl_tipoconcreto" class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Concreto tipo N°</th>
                        <th>Concreto tipo</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")

    <script>
        $('#tbl_jornada').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/componentes/listar2',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'jornada_nombre',
                        name: 'jornada_nombre',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
    <script>
        $('#tbl_etapa').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/componentes/listar1',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'etapa',
                        name: 'etapa',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
    <script>
        $('#tbl_modalidad').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/componentes/listar3',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'modalidad',
                        name: 'modalidad',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
    <script>
        $('#tbl_tipoconcreto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/componentes/listar',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'tipo_concreto',
                        name: 'tipo_concreto',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
