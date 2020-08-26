@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Encuestas</strong>
            <a href="/encuesta/crear" class="btn btn-link">Crear Encuesta</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_encuesta" style="width: 100%;" class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Id Servicio</th>
                    <th>Director Obra</th>
                    <th>Constructora</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Mes</th>
                    <th>Puntualidad</th>
                    <th>Solucion problemas</th>
                    <th>respuesta 1_3</th>
                    <th>respuesta 1_4</th>
                    <th>respuesta 2</th>
                    <th>respuesta 3</th>
                    <th>respuesta 4</th>
                    <th>respuesta 5</th>
                    <th>respuesta 6</th>
                    <th>respuesta 7</th>
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
        $('#tbl_encuesta').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/encuesta/listar',
                columns: [
                    {
                     data: 'idservicio',
                     name: 'idservicio'
                    },
                    {
                     data: 'directorobra',
                     name: 'directorobra'
                    },
                    {
                        data: 'constructora',
                        name: 'constructora'
                    },
                    {
                        data: 'correo',
                        name: 'correo'
                    },
                    {
                        data: 'celular',
                        name: 'celular'
                    },
                    {
                        data: 'mes',
                        name: 'mes'
                    },
                    {
                        data: 'respuesta1_1',
                        name: 'respuesta1_1'
                    },
                    {
                        data: 'respuesta1_2',
                        name: 'respuesta1_2'
                    },
                    {
                        data: 'respuesta1_3',
                        name: 'respuesta1_3'
                    },
                    {
                        data: 'respuesta1_4',
                        name: 'respuesta1_4'
                    },
                    {
                        data: 'respuesta2',
                        name: 'respuesta2'
                    },
                    {
                        data: 'respuesta3',
                        name: 'respuesta3'
                    },
                    {
                        data: 'respuesta4',
                        name: 'respuesta4'
                    },
                    {
                        data: 'respuesta5',
                        name: 'respuesta5'
                    },
                    {
                        data: 'respuesta6',
                        name: 'respuesta6'
                    },
                    {
                        data: 'respuesta7',
                        name: 'respuesta7'
                    }
                ]
            });

    </script>
@endsection

