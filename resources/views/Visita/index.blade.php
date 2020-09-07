@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>CITAS</strong>
            <a href="/listachequeo" class="btn btn-outline-light">LISTA DE CHEQUEO</a>
        </div>

        <div class="card-body">
        @include('flash::message')
            <table id="tbl_visita" class="table table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>Visita No</th>
                    <th>Tipo Visita</th>
                    <th>Obra</th>
                    <th>Encargado Visita</th>
                    <th>Fecha</th>
                    <th>Viabilidad</th>
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
        $('#tbl_visita').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/visita/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'tipovisita',
                     name: 'tipovisita',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'nombre_obra',
                     name: 'nombre_obra'
                    },
                    {
                        data: 'encargadovisita',
                        name: 'encargadovisita'
                    },
                    {
                        data: 'Fecha_Hora',
                        name: 'Fecha_Hora'
                    },
                   
                    {
                        data: 'viabilidad',
                        name: 'viabilidad'
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                     }, {
                        data: 'eliminar',
                        name: 'eliminar',
                        orderable: false,
                        searchable: false
                     }
                ]
            });

    </script>
   

@endsection