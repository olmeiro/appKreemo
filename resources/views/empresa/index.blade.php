@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>EMPRESAS</strong>
            <a href="/empresa/crear" class="btn btn-outline-light float-right">CREAR EMPRESA</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_empresa" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Representante</th>
                    <th>Dirección</th>
                    <th>Telefono </th>
                    <th>Correo </th>
                    <th>Editar</th>
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
        $('#tbl_empresa').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/empresa/listar',
                columns: [
                    {
                     data: 'nit',
                     name: 'nit',
                    },
                    {
                     data: 'nombre',
                     name: 'nombre',
                    },
                    {
                     data: 'nombrerepresentante',
                     name: 'nombrerepresentante',
                    },
                    {
                        data: 'direccion',
                        name: 'direccion'
                    },
                    {
                        data: 'telefono1',
                        name: 'telefono1'
                    },
                    {
                        data: 'correo1',
                        name: 'correo1'
                    },
                    {
                        data: 'editar',
                        name: 'editar',
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
