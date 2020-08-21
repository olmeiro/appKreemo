@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Contactos</strong>
            <a href="/cliente/crear" class="btn btn-link">Crear Contacto</a>
            <a href="/tipocontacto/crear" class="btn btn-link">Crear Tipo Contacto</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_contacto" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>Tipo Contacto</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Documento</th>
                    <th>Estado</th>
                    <th>Telefono 1</th>
                    <th>Correo 1</th>
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
        $('#tbl_contacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/cliente/listar',
                columns: [
                    {
                     data: 'tipocontacto',
                     name: 'tipocontacto',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'nombre',
                     name: 'nombre'
                    },
                    {
                        data: 'apellido1',
                        name: 'apellido1'
                    },
                    {
                        data: 'apellido2',
                        name: 'apellido2'
                    },
                   
                    {
                        data: 'estado',
                        name: 'estado'
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
                    {
                        data: 'cambiar',
                        name: 'cambiar',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

    </script>
@endsection

