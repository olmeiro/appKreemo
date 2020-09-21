@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>CITAS</strong>
            <a href="/listachequeo" class="btn btn-outline-light float-right">LISTA DE CHEQUEO</a>
        </div>

        <div class="card-body">
        @include('flash::message')
            <table id="tbl_visita" class="table table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo Visita</th>
                    <th>Obra</th>
                    <th>Fecha</th>
                    <th>Hora Inicio</th>
                    <th>Hora Final</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                    <th>Lista Chequeo</th>
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
                ajax: '/visita/listarvisitas',
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
                        data: 'fecha',
                        name: 'fecha'
                    },
                    {
                        data: 'horainicio',
                        name: 'horainicio'
                    },
                   
                    {
                        data: 'horafinal',
                        name: 'horafinal'
                    },
                    {
                        data: 'estado',
                        name: 'estado'
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'listaChequeo',
                        name: 'listaChequeo',
                        orderable: false,
                        searchable: false
                     }
                ]
            });
    </script>
   

@endsection