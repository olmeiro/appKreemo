@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Operario</strong>
            <a href="/operario/crear" class="btn btn-link">Crear Operario</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Crear Operario</button>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_operario" class="table table-bordered table-striped table-responsive" style="width: 100px;">
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
    <div class="modal" tabindex="-1" id="exampleModal1">
        <div class="modal-dialog">
            <div class="modal-content">
        @include('flash::message')
            <form action="/operario/guardar" method="POST" enctype="multipart/form-data" name="FrmCrearOperario" id="FrmCrearOperario">
            @csrf
            <div class="modal-header">
                        <h5 class="modal-title">Crear Operario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <label class="validacion" id="validacion_nombre"></label>
                            <input value="{{old('nombre')}}" type="text" class="form-control @error('nombre') is-invalid @enderror solo_letras"  name="nombre" id="nombre" onkeypress="return soloLetras(event)">
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_nombre2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Apellido</label>
                            <label class="validacion" id="validacion_apellido"></label>
                            <input value="{{old('apellido')}}" type="text" class="form-control @error('apellido') is-invalid @enderror solo_letras"  name="apellido" id="apellido" onkeypress="return soloLetras(event)">
                            @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_apellido2"></label>
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Documento</label>
                            <label class="validacion" id="validacion_documento"></label>
                            <input value="{{old('documento')}}" type="text" class="form-control @error('documento') is-invalid @enderror solo_numeros"  name="documento" id="documento" onkeypress="return soloNumeros(event)">
                            @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_documento2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Celular</label>
                            <label class="validacion" id="validacion_celular"></label>
                            <input value="{{old('celular')}}" type="text" class="form-control @error('celular') is-invalid @enderror solo_numeros"  name="celular" id="celular" onkeypress="return soloNumeros(event)">
                            @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_celular2"></label>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
                <a href="/operario" class="btn btn-outline-primary float-right" >Volver</a>
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
    <script src="{{ asset('js/validacionOperario.js') }}"></script>

@endsection

