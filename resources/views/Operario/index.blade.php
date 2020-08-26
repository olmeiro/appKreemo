@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Operario</strong>
            <a href="/operario/crear" class="btn btn-link">Crear Operario</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_operario" class="table table-bordered table-responsive" style="width: 100px;">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Celular</th>
                    <th>Editar</th>
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
        $('#tbl_operario').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/operario/listar',
                columns: [
                    {
                     data: 'nombre',
                     name: 'nombre'
                    },
                    {
                        data: 'apellido',
                        name: 'apellido'
                    },
                    {
                        data: 'documento',
                        name: 'documento'
                    },
                    {
                        data: 'celular',
                        name: 'celular'
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
                    },
                ]
            });

    </script>
@endsection

