@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Empresas</strong>
            <strong class="float-right"><button type="button" class="btn btn-outline-light float-rigth" data-toggle="modal" data-target="#exampleModal2">Crear empresa</button></strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <h4 id="msg"></h4>
            <table id="tbl_empresa" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th>NIT</th>
                        <th>Nombre empresa</th>
                        <th>Representante</th>
                        <th>Dirección</th>
                        <th>Teléfono </th>
                        <th>Correo </th>
                        <th>Estado</th>
                        <th>Cambiar estado</th>
                        <th>Agregar obra</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Crear Empresa -->

    <div class="modal fade" data-backdrop="static" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                        <h5 class="modal-title" id="exampleModalLabel2">Crear empresa</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                @include('flash::message')
                <form class="form-signin col-md-12" action="" method="POST" id="frmEmpresa">
                    @csrf
                    <div class="modal-body">
                            <div class="row">
                                            <div class="col-md-6">
                                                <label for="">NIT o cédula</label>
                                                <input type="text" class="form-control @error('nit') is-invalid @enderror"  name="nit" id="nit" onkeypress="return soloNumeros(event)">
                                                @error('nit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <label class="validacion solo_numeros" for="nit" id="valNit"></label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Nombre de la empresa</label>
                                                <input type="text" class="form-control @error('nombre') is-invalid @enderror solo_letras sin_especiales"  name="nombre" id="nombre" onchange="validate()" onkeypress="return soloLetras(event)">
                                                @error('nombre')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <label class="validacion" for="nombre" id="valNombre"></label>
                                            </div>
                            </div>
                            <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Nombre representante</label>
                                                <input type="text" class="form-control @error('nombrerepresentante') is-invalid @enderror solo_letras sin_especiales"  name="nombrerepresentante" id="nombrerepresentante" onchange="validate()" onkeypress="return soloLetras(event)">
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
                                            <label for="">Teléfono #1</label>
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
                    <div class="modal-footer">
                            <button type="button" id="crearEmpresa" class="btn btn-success">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Empresa -->

    <div class="modal fade" data-backdrop="static" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                        <h5 class="modal-title" id="exampleModalLabel2">Editar empresa</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <form class="editEmpresa" name="empresaForm" id="editEmpresaFrm" action="/empresa/guardar"method="POST">
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" name="empresa_id" id="empresa_id" >

                            <div class="row">
                                        <div class="col-md-6">
                                            <label for="">NIT</label>
                                            <input type="text" class="form-control @error('nit') is-invalid @enderror" onkeypress="return soloNumeros(event)"  name="enit" id="enit" onchange="validate()" >
                                            @error('nit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="enit" id="valENit"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Nombre de la empresa</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror solo_letras sin_especiales"  name="enombre" id="enombre" onchange="validate()" onkeypress="return soloLetras(event)">
                                            @error('nombre')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="enombre" id="valENombre"></label>
                                        </div>
                            </div>
                            <div class="row">
                                        <div class="col-md-6">
                                        <label for="">Nombre Representante</label>
                                        <input type="text" class="form-control @error('nombrerepresentante') is-invalid @enderror solo_letras sin_especiales"  name="enombrerepresentante" id="enombrerepresentante" onchange="validate()" onkeypress="return soloLetras(event)">
                                        @error('nombrerepresentante')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <label class="validacion" for="enombrerepresentante" id="valENombreRep"></label>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="edireccion" id="edireccion">
                                        @error('direccion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                            <label class="validacion" for="edireccion" id="valEDireccion"></label>
                                        </div>
                            </div>
                            <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Teléfono #1</label>
                                            <input type="text" class="form-control @error('telefono1') is-invalid @enderror solo_numeros"  name="etelefono1" id="etelefono1">
                                            @error('telefono1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="etelefono1" id="valETelefono1"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Correo #1</label>
                                            <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="ecorreo1" id="ecorreo1">
                                            @error('correo1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="ecorreo1" id="valECorreo1"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Estado</label>
                                            <select class="form-control" name="eestado" id="eestado">
                                                <option value="1">Activo</option>
                                                <option value="0">Pasivo</option>
                                            </select>
                                            <label class="validacion" for="eestado" id="valEEstado"></label>
                                        </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Editar</button>
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
@endsection

@section("scripts")

    <script>
        var table = $('#tbl_empresa').DataTable({
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
                        data: 'estado',
                        name: 'estado'
                    },
                    {
                        data: 'cambiar',
                        name: 'cambiar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'agregar',
                        name: 'agregar'
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
                            },
                            "columnDefs": [
                                {
                                        "targets": [6],
                                        "createdCell": function(td, cellData, rowData, row, col) {
                                            var color;
                                            switch(cellData) {
                                            case "Pasivo":
                                                color = '#FA3636 ';
                                                $(td).addClass('pasivo');
                                                break;
                                            case "Activo":
                                                color = '#06B33A';
                                                $(td).addClass('activo');
                                                break;
                                            default:
                                                color = '#FFDE00';
                                                break;
                                            }
                                            $(td).css('background',color);
                                        }
                                    }
                                ],

            });

            $('body').on('click', '#editar-Empresa', function () {
                var empresa_id = $(this).data('id');
                $.get('empresa/edit/'+empresa_id, function (data) {
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
                $('#eestado').val(data.estado);
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

