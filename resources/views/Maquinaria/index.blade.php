@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Maquinaria</strong>
            <a href="/maquinaria/crear" class="btn btn-link">Crear Maquina</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Crear Maquinaria </button>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_maquinaria" class="table table-striped table-bordered table-responsive " style="width: 100%;">
                <thead>
                <tr>
                    <th>Id Maquina</th>
                    <th>estado</th>
                    <th>Serial Equipo</th>
                    <th>Modelo</th>
                    <th>Serial Motor</th>
                    <th>Observación</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
                    <th>Eliminar</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
</div>
    <div class="modal" tabindex="-1" id="exampleModal1">
        <div class="modal-dialog">
            <div class="modal-content">
            @include('flash::message')
            <form action="/maquinaria/guardar" method="POST" enctype="multipart/form-data" name="FrmCrearMaquinaria" id="FrmCrearMaquinaria">
            @csrf
            <div class="modal-header">
                        <h5 class="modal-title">Crear Maquina</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Serial Equipo</label>
                            <label class="validacion" id="validacion_serialequipo"></label>
                            <input value="{{old('serialequipo')}}" type="text" class="form-control @error('serialequipo') is-invalid @enderror solo_numeros"  name="serialequipo" id="serialequipo">
                            @error('serialequipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_serialequipo2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Modelo</label>
                            <label class="validacion" id="validacion_modelo"></label>
                            <input value="{{old('modelo')}}" type="text" class="form-control @error('modelo') is-invalid @enderror solo_letras"  name="modelo" id="modelo">
                            @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_modelo2"></label>
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Serial Motor</label>
                            <label class="validacion" id="validacion_serialmotor"></label>
                            <input value="{{old('serialmotor')}}" type="text" class="form-control @error('serialmotor') is-invalid @enderror"  name="serialmotor" id="serialmotor">
                            @error('serialmotor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_serialmotor2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Observación</label>
                            <label class="validacion" id="validacion_observacion"></label>
                            <input value="{{old('observacion')}}" type="text" class="form-control @error('observacion') is-invalid @enderror solo_letras"  name="observacion" id="observacion">
                            @error('observacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_observacion2"></label>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
                <a href="/maquinaria" class="btn btn-outline-primary float-right" >Volver</a>
                </div>
            </form>
        </div>
        </div>
        </div>
@endsection

@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleMaquiOperario.css') }}" rel="stylesheet">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
    <script src="{{ asset('js/validacionMaquinaria.js') }}"></script>

@endsection

