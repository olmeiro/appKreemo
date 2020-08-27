@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>LISTADO DE COTIZACIONES</strong>
                <a class="btn btn-link" href="/cotizacion/crear">CREAR COTIZACIÓN</a>
                <a class="btn btn-link" href=""><i class="fas fa-file-pdf"> </i> GENERAR REPORTE</a>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_cotizacion" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead class="" align="center">
                <tr>
                    <th>Cotizacion N°</th>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Modalidad</th>
                    <th>Etapa</th>
                    <th>Jornada</th>
                    <th>Tipo Concreto</th>
                    <th>Obra</th>
                    <th>maquinaria</th>
                    <th>Operario</th>
                    <th>Fecha Cotización</th>
                    <th>Fecha Inicio Bombeo</th>
                    <th>Ciudad</th>
                    <th>Cantidad de losas</th>
                    <th>Cantidad de tuberia</th>
                    <th>Cantidad de Metros </th>
                    <th>Valor del Metro </th>
                    <th>AIU</th>
                    <th>Subtotal</th>
                    <th>IVA al AIU</th>
                    <th>Valor Total</th>
                    <th>Observaciones</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section("scripts")

    <script>
        $('#tbl_cotizacion').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/cotizacion/listar',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'nombre_empresa',
                        name: 'nombre_empresa',
                    },
                    {
                        data: 'estado_cotizacion',
                        name: 'estado_cotizacion',
                    },
                    {
                        data: 'modalidad',
                        name: 'modalidad',
                    },
                    {
                        data: 'etapa',
                        name: 'etapa',
                    },
                    {
                        data: 'jornada_nombre',
                        name: 'jornada_nombre',
                    },
                    {
                        data: 'tipo_concreto',
                        name: 'tipo_concreto',
                    },
                    {
                        data: 'nombre_obra',
                        name: 'nombre_obra',
                    },
                    {
                        data: 'modelo',
                        name: 'modelo',
                    },
                    {
                        data: 'nombre',
                        name: 'nombre',
                    },
                    {
                        data: 'fechaCotizacion',
                        name: 'fechaCotizacion',
                    },
                    {
                        data: 'inicioBombeo',
                        name: 'inicioBombeo',
                    },
                    {
                        data: 'ciudad',
                        name: 'ciudad',
                    },
                    {
                        data: 'losas',
                        name: 'losas',
                    },
                    {
                        data: 'tuberia',
                        name: 'tuberia',
                    },
                    {
                        data: 'metrosCubicos',
                        name: 'metrosCubicos',
                    },
                    {
                        data: 'valorMetro',
                        name: 'valorMetro',
                    },
                    {
                        data: 'AIU',
                        name: 'AIU',
                    },
                    {
                        data: 'subtotal',
                        name: 'subtotal',
                    },
                    {
                        data: 'ivaAIU',
                        name: 'ivaAIU',
                    },
                    {
                        data: 'valorTotal',
                        name: 'valorTotal',
                    },
                    {
                        data: 'observaciones',
                        name: 'observaciones',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'editarEstado',
                        name: 'editarEstado',
                        orderable: false,
                        searchable: false,
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
