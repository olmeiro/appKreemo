@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Maquinaria</strong>
            <a href="/maquinaria/crear" class="btn btn-link">Crear Maquina</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_maquinaria" class="table table-striped table-bordered table-responsive " style="width: 100%;">
                <thead>
                <tr>
                    <th>Id Maquina</th>
                    <th>estado</th>
                    <th>Serial Equipo</th>
                    <th>Modelo</th>
                    <th>Serial Motor</th>
                    <th>Observación</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
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
        $('#tbl_maquinaria').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/maquinaria/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id'
                    },
                    {
                        data: 'estado',
                        name: 'estado'
                    },
                    {
                        data: 'serialequipo',
                        name: 'serialequipo'
                    },
                    {
                        data: 'modelo',
                        name: 'modelo'
                    },
                    {
                        data: 'serialmotor',
                        name: 'serialmotor'
                    },
                    {
                        data: 'observacion',
                        name: 'observacion',
                        orderable: false,
                     searchable: false
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'cambiar',
                        name: 'cambiar',
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

