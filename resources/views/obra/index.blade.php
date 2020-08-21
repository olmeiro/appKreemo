@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header">
            <strong>Obras</strong>
            <a href="/obra/crear" class="btn btn-link">Crear Obra</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_obra" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono 1</th>
                    <th>Correo 1</th>
                    <th>ver</th>
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
        $('#tbl_obra').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/obra/listar',
                columns: [
                    {
                     data: 'nombre',
                     name: 'nombre',
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
                        data: 'ver',
                        name: 'ver',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

    </script>
@endsection