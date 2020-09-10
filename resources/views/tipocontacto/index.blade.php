@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>TIPO CONTACTOS</strong>
            <a href="/tipocontacto/crear" class="btn btn-link">Crear Tipo Contacto</a>
            <a href="/cliente" class="btn btn-link">Volver a contactos</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_tipocontacto" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo Contacto</th>
                    <th>Fecha Creación</th>
                    <th>Editar</th>
                    <th>eliminar</th>
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
        $('#tbl_tipocontacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/tipocontacto/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id'
                    },
                    {
                     data: 'tipocontacto',
                     name: 'tipocontacto'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
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
                ]
            });

    </script>
@endsection

