@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>LISTADO DE COTIZACIONES</strong>
                <a class="btn btn-link" href="/cotizacion/crear">CREAR COTIZACIÓN</a>
                <a class="btn btn-link" href=""><i class="fas fa-file-pdf"> </i> GENERAR REPORTE</a>
                <a class="btn btn-link" href="/cotizacion/wizardModal">WIZAR</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Launch multistep Wizard </button> </div>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_cotizacion" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead class="" align="center">
                <tr>
                    <th>Cotizacion N°</th>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Modalidad</th>
                    <th>Etapa</th>
                    <th>Jornada</th>
                    <th>Tipo Concreto</th>
                    <th>Obra</th>
                    <th>maquinaria</th>
                    <th>Operario</th>
                    <th>Fecha Cotización</th>
                    <th>Fecha Inicio Bombeo</th>
                    <th>Ciudad</th>
                    <th>Cantidad de losas</th>
                    <th>Cantidad de tuberia</th>
                    <th>Cantidad de Metros </th>
                    <th>Valor del Metro </th>
                    <th>AIU</th>
                    <th>Subtotal</th>
                    <th>IVA al AIU</th>
                    <th>Valor Total</th>
                    <th>Observaciones</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Smart Wizard modal</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">Step 1<br /><small>Account Info</small></a></li>
                        <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
                        <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
                        <li><a href="#step-4">Step 4<br /><small>Confirm details</small></a></li>
                    </ul>
                    <div>
                        <div id="step-1">
                            <div class="row">
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Name" required> </div>
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Email" required> </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Password" required> </div>
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Repeat password" required> </div>
                            </div>
                        </div>
                        <div id="step-2">
                            <div class="row">
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Address" required> </div>
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="City" required> </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="State" required> </div>
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Country" required> </div>
                            </div>
                        </div>
                        <div id="step-3" class="">
                            <div class="row">
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Number" required> </div>
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Holder Name" required> </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="CVV" required> </div>
                                <div class="col-md-6"> <input type="text" class="form-control" placeholder="Mobile Number" required> </div>
                            </div>
                        </div>
                        <div id="step-4" class="">
                            <div class="row">
                                <div class="col-md-12"> <span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection
@section("scripts")

    <script>
        $('#tbl_cotizacion').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/cotizacion/listar',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'nombre_empresa',
                        name: 'nombre_empresa',
                    },
                    {
                        data: 'estado_cotizacion',
                        name: 'estado_cotizacion',
                    },
                    {
                        data: 'modalidad',
                        name: 'modalidad',
                    },
                    {
                        data: 'etapa',
                        name: 'etapa',
                    },
                    {
                        data: 'jornada_nombre',
                        name: 'jornada_nombre',
                    },
                    {
                        data: 'tipo_concreto',
                        name: 'tipo_concreto',
                    },
                    {
                        data: 'nombre_obra',
                        name: 'nombre_obra',
                    },
                    {
                        data: 'modelo',
                        name: 'modelo',
                    },
                    {
                        data: 'nombre',
                        name: 'nombre',
                    },
                    {
                        data: 'fechaCotizacion',
                        name: 'fechaCotizacion',
                    },
                    {
                        data: 'inicioBombeo',
                        name: 'inicioBombeo',
                    },
                    {
                        data: 'ciudad',
                        name: 'ciudad',
                    },
                    {
                        data: 'losas',
                        name: 'losas',
                    },
                    {
                        data: 'tuberia',
                        name: 'tuberia',
                    },
                    {
                        data: 'metrosCubicos',
                        name: 'metrosCubicos',
                    },
                    {
                        data: 'valorMetro',
                        name: 'valorMetro',
                    },
                    {
                        data: 'AIU',
                        name: 'AIU',
                    },
                    {
                        data: 'subtotal',
                        name: 'subtotal',
                    },
                    {
                        data: 'ivaAIU',
                        name: 'ivaAIU',
                    },
                    {
                        data: 'valorTotal',
                        name: 'valorTotal',
                    },
                    {
                        data: 'observaciones',
                        name: 'observaciones',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'editarEstado',
                        name: 'editarEstado',
                        orderable: false,
                        searchable: false,
                    },
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                            }
            });

    </script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
@endsection



