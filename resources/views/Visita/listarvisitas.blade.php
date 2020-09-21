@extends('layouts.app')

<!-- @section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

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
                    <th>Visita No</th>
                    <th>Tipo Visita</th>
                    <th>Obra</th>
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
@endsection
@section("style")
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.css")}}'rel='stylesheet'/>
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.min.css")}}'rel='stylesheet'/>
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
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.min.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/locales/es.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/moment.min.js")}}'></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionVisita1.js') }}"></script>

@endsection
 -->


