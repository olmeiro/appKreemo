@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header">
            <strong>Maquinaria</strong>
            <a href="/maquinaria/crear" class="btn btn-link">Crear Maquina</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_maquinaria" class="table table-striped   table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>Id Maquina</th>
                    <th>estado</th>
                    <th>Serial Equipo</th>
                    <th>Modelo</th>
                    <th>Serial Motor</th>
                    <th>observación</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
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
                ]
            });

    </script>
@endsection

