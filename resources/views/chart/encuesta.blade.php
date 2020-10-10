@extends('layouts.app')

@section('body')
<div class="container justify-content-center col-md-8">
    <div class="card" >
            <div class="card-header">
                <strong>Encuestas</strong>
            </div>
            <div class="card-body">
            @include('flash::message')
                <table id="tbl_encuesta"  class="table table-bordered table-striped table-responsive" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>N° Servicio</th>
                        <th>Nombre Director</th>
                        <th>Constructora</th>
                        <th>Tuvo Inconveniente</th>
                        <th>Descripción</th>
                        <th>Fecha encuesta</th>
                        <th>Ver Encuesta</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
@section("scripts")
    <script>
        $('#tbl_encuesta').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/encuesta/listar',
                columns: [
                    {
                    data: 'idservicio',
                    name: 'idservicio'
                    },
                    {
                    data: 'directorobra',
                    name: 'directorobra'
                    },
                    {
                    data: 'constructora',
                    name: 'constructora'
                    },
                    {
                    data: 'respuesta2',
                    name: 'respuesta2'
                    },
                    {
                    data: 'respuesta3',
                    name: 'respuesta3'
                    },
                    {
                    data: 'mes',
                    name: 'mes'
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionEncuesta.js') }}"></script>
@endsection
