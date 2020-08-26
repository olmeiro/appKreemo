@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Servicios</strong>
            <a href="/servicio/crear" class="btn btn-link">Crear Servicio</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_servicio" style="width: 100%;" class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Estado Servicio</th>
                    <th>N° Cotización</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
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
        $('#tbl_servicio').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/servicio/listar',
                columns: [
                    {
                    data: 'idestadoservicio',
                    name: 'idestadoservicio'
                    },
                    {
                    data: 'idcotizacion',
                    name: 'idcotizacion'
                    },
                    {
                    data: 'fechainicio',
                    name: 'fechainicio'
                    },
                    {
                    data: 'fechafin',
                    name: 'fechafin'
                    }
                ]
            });

    </script>
@endsection

