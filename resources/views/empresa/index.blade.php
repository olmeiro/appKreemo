@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>EMPRESAS</strong>

            <a href="/empresa/crear" class="btn btn-outline-light">CREAR EMPRESA</a>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal2">CREAR EMPRESA MODAL</button>

        </div>
        <div class="card-body">
        @include('flash::message')
        <h4 id="msg"></h4>
            <table id="tbl_empresa" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Representante</th>
                    <th>Dirección</th>
                    <th>Telefono </th>
                    <th>Correo </th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Crear Empresa</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    @include('flash::message')
                    <form class="form-signin col-md-12" action="" method="POST" id="frmEmpresa">
                    @csrf
                        <div id="smartwizard">
                            <ul>
                                <li><a href="#step-1">Paso 1<br /><small>Crear Empresa</small></a></li>
                            </ul>
                            <div>
                                <div id="step-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">NIT</label>
                                            <input type="text" class="form-control @error('nit') is-invalid @enderror"  name="nit" id="nit">
                                            @error('nit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion solo_numeros" for="nit" id="valNit"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Nombre</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror solo_letras sin_especiales"  name="nombre" id="nombre">
                                            @error('nombre')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="nombre" id="valNombre"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <label for="">Nombre Representante</label>
                                        <input type="text" class="form-control @error('nombrerepresentante') is-invalid @enderror solo_letras sin_especiales"  name="nombrerepresentante" id="nombrerepresentante">
                                        @error('nombrerepresentante')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <label class="validacion" for="nombrerepresentante" id="valNombreRep"></label>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion">
                                        @error('direccion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <label class="validacion" for="direccion" id="valDireccion"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Telefono #1</label>
                                            <input type="text" class="form-control @error('telefono1') is-invalid @enderror solo_numeros"  name="telefono1" id="telefono1">
                                            @error('telefono1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="telefono1" id="valTelefono1"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Correo #1</label>
                                            <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                                            @error('correo1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="correo1" id="valCorreo1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="button" id="crearEmpresa" class="btn btn-primary" >Guardar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                        <h4 class="modal-title" id="empresaCrudModal"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="card-header">
                            <strong>x</strong>
                        </div>
                    </div>
                <div class="modal-body">
                    <form class="editEmpresa" name="empresaForm" action="/empresa/guardar" method="POST">
                    @csrf
                    <input type="hidden" name="empresa_id" id="empresa_id" >
                        <div id="smartwizard">
                            <ul>
                                <li><a>Paso 1<br /><small>Editar Empresa</small></a></li>
                            </ul>
                            <div>
                                <div id="step-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">NIT</label>
                                            <input type="text" class="form-control @error('nit') is-invalid @enderror"  name="enit" id="enit">
                                            @error('nit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion solo_numeros" for="nit" id="valNit"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Nombre</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror solo_letras sin_especiales"  name="enombre" id="enombre">
                                            @error('nombre')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="nombre" id="valNombre"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <label for="">Nombre Representante</label>
                                        <input type="text" class="form-control @error('nombrerepresentante') is-invalid @enderror solo_letras sin_especiales"  name="enombrerepresentante" id="enombrerepresentante">
                                        @error('nombrerepresentante')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <label class="validacion" for="nombrerepresentante" id="valNombreRep"></label>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="edireccion" id="edireccion">
                                        @error('direccion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <label class="validacion" for="direccion" id="valDireccion"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Telefono #1</label>
                                            <input type="text" class="form-control @error('telefono1') is-invalid @enderror solo_numeros"  name="etelefono1" id="etelefono1">
                                            @error('telefono1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="telefono1" id="valTelefono1"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Correo #1</label>
                                            <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="ecorreo1" id="ecorreo1">
                                            @error('correo1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="correo1" id="valCorreo1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Guardar</button>
                                <a href="/empresa" class="btn btn-danger">Cancelar</a>
                            </div>
                    </form>
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
        $('#tbl_empresa').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/empresa/listar',
                columns: [
                    {
                     data: 'nit',
                     name: 'nit',
                    },
                    {
                     data: 'nombre',
                     name: 'nombre',
                    },
                    {
                     data: 'nombrerepresentante',
                     name: 'nombrerepresentante',
                    },
                    {
                        data: 'direccion',
                        name: 'direccion'
                    },
                    {
                        data: 'telefono1',
                        name: 'telefono1'
                    },
                    {
                        data: 'correo1',
                        name: 'correo1'
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

            $('body').on('click', '#editar-Empresa', function () {
            var empresa_id = $(this).data('id');
            $.get('empresa/'+empresa_id+'/edit', function (data) {
            $('#empresaCrudModal').html("X");
            $('#btn-update').val("Update");
            $('#btn-save').prop('disabled',false);
            $('#exampleModal4').modal('show');
            $('#empresa_id').val(data.id);
            $('#enit').val(data.nit);
            $('#enombre').val(data.nombre);
            $('#enombrerepresentante').val(data.nombrerepresentante);
            $('#edireccion').val(data.direccion);
            $('#etelefono1').val(data.telefono1);
            $('#ecorreo1').val(data.correo1);


    })
    });

    function validate()
        {
        if(document.clienteForm.empresa_id.value !='' && document.clienteForm.enit.value !='' && document.clienteForm.enombre.value !=''
        && document.clienteForm.enombrerepresentante.value !='' && document.clienteForm.edireccion.value !='' && document.clienteForm.etelefono1.value !=''
        && document.clienteForm.ecorreo1.value !='')
        {
            document.clienteForm.btnsave.disabled=false
        }
        else
        {
            document.clienteForm.btnsave.disabled=true
        }
    }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('js/validacionEmpresa.js') }}"></script>
@endsection

