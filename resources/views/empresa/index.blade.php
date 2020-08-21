@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header">
            <strong>Empresas</strong>
            <a href="/empresa/crear" class="btn btn-link">Crear Empresa</a>
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
                ]
            });

    </script>
@endsection