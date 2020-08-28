@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Lista de chequeo</strong>
            <a href="/listachequeo/crear" class="btn btn-link">Crear listachequeo</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_listachequeo" class="table table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>Visita No</th>
                    <th>Id Visita</th>
                    <th>Número Planilla</th>
                    <th>Estado Via para ingreso grúa</th>
                    <th>Necesidad de PH</th>
                    <th>Hueco (min 6*3 mts)</th>
                    <th>Techo (min 3mts de altura)</th>
                    <th>Desarenadero</th>
                    <th>Desague</th>
                    <th>Agua suficiente</th>
                    <th>Líneas Eléctricas</th>
                    <th>Señalización (escalas, volados y pilas)</th>
                    <th>Baños</th>
                    <th>Condiciones Inseguras</th>
                    <th>Orden Público</th>
                    <th>Vigilancia Nocturna</th>
                    <th>Caspete</th>
                    <th>Información de SST</th>
                    <th>Políticas de horas extras</th>
                    <th>Encargado Visita</th>
                    <th>Viabilidad</th>
                    <th>Editar</th>
                    <!-- <th>Cambiar Viabilidad</th>  -->
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
        $('#tbl_listachequeo').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/listachequeo/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'idvisita',
                     name: 'idvisita',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'numeroplanilla',
                     name: 'numeroplanilla'
                    },
                    {
                        data: 'estadovia',
                        name: 'estadovia'
                    },
                    {
                        data: 'ph',
                        name: 'ph'
                    },
                   
                    {
                        data: 'hueco',
                        name: 'hueco'
                    },
                    {
                        data: 'techo',
                        name: 'techo'
                    },
                    {
                        data: 'desarenadero',
                        name: 'desarenadero'
                    },
                    {
                        data: 'desague',
                        name: 'desague'
                    },
                   
                    {
                        data: 'agua',
                        name: 'agua'
                    },
                    {
                        data: 'lineaelectrica',
                        name: 'lineaelectrica'
                    },
                    {
                        data: 'senializacion',
                        name: 'senializacion'
                    },
                    {
                        data: 'banios',
                        name: 'banios'
                    },
                    {
                        data: 'condicioninsegura',
                        name: 'condicioninsegura'
                    },
                    {
                        data: 'ordenpublico',
                        name: 'ordenpublico'
                    },
                    {
                        data: 'vigilancia',
                        name: 'vigilancia'
                    },
                   
                    {
                        data: 'caspete',
                        name: 'caspete'
                    },
                    {
                        data: 'infoSST',
                        name: 'infoSST'
                    },
                    {
                        data: 'politicashoras',
                        name: 'politicashoras'
                    },
                    {
                        data: 'encargadovisita',
                        name: 'encargadovisita'
                    },
                    {
                        data: 'viabilidad',
                        name: 'viabilidad'
                    }
                    ,{
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                     },
                    // {
                    //     data: 'cambiar',
                    //     name: 'cambiar',
                    //     orderable: false,
                    //     searchable: false
                    // }
                ]
            });

    </script>
@endsection

