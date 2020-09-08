@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('body')

    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>CONTACTOS</strong>
            <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModal1">CREAR TIPO CONTACTO</button>
            <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModal3">LISTA TIPO CONTACTOS</button>
            <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModal2">CREAR CONTACTO</button>
        </div>
        <div class="card-body">
        @include('flash::message')
        <h4 id="mensaje"></h4>
            <table id="tbl_contacto" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo Contacto</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Documento</th>
                    <th>Estado</th>
                    <th>Telefono 1</th>
                    <th>Correo 1</th>
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

    <div class="modal fade" id="exampleModal1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    @include('flash::message')
                    <form class="col-md-12 " action="" method="POST" id="frmTipoContacto">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Tipo Contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar1()">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Defina el tipo de contacto</h5>
                        <div class="form-group">
                            <label for="">Tipo Contacto</label>
                            <input type="text" class="form-control @error('tipocontacto') is-invalid @enderror" onkeypress="return soloLetras(event)"  name="tipocontacto" id="tipocontacto">
                            @error('tipocontacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="tipocontacto" id="valTipoContacto"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="crearTipoContacto" class="btn btn-primary">Crear</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    <div class="modal fade" data-backdrop="static" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Crear Contacto</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    @include('flash::message')
                    <form class="form-signin col-md-12" action="" method="POST" name="" id="frmContacto">
                    @csrf
                        <div id="smartwizard">
                            <ul>
                                <li><a href="#step-1">Paso 1<br /><small>Defina el tipo de contacto</small></a></li>
                                <li><a href="#step-2">Paso 2<br /><small>Datos Del Contacto</small></a></li>
                                <li><a href="#step-3">Paso 3<br /><small>Télefono Y Correo del Contacto</small></a></li>
                            </ul>
                            <div>
                                <div id="step-1">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tipo Contacto</label>
                                                <select class="form-control @error('idtipocontacto') is-invalid @enderror" name="idtipocontacto" id="idtipocontacto">
                                                    <option value="0">Seleccione</option>
                                                    @foreach($tipoContacto as $key =>$value)
                                                        <option value="{{ $value->id }}">{{ $value->tipocontacto}}</option>
                                                    @endforeach
                                                </select>
                                                @error('idtipocontacto')
                                                    <div class="invalid-feedback">{{ $message }} ></div>
                                                @enderror
                                                <label class="validacion" for="idtipocontacto" id="valContacto"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Nombre</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" onkeypress="return soloLetras(event)" name="nombre" id="nombre">
                                            @error('nombre')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="nombre" id="valNombre"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Primer Apellido</label>
                                            <input type="text" class="form-control @error('apellido1') is-invalid @enderror" onkeypress="return soloLetras(event)"  name="apellido1" id="apellido1">
                                            @error('apellido1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="apellido1" id="valApellido1"></label>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label for="">Segundo Apellido</label>
                                            <input type="text" class="form-control @error('apellido2') is-invalid @enderror" onkeypress="return soloLetras(event)"  name="apellido2" id="apellido2">
                                            @error('apellido2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="apellido2" id="valApellido2"></label>
                                        </div>
                                        <div class="col-md-6"><label for="">Documento</label>
                                            <input type="number" class="form-control @error('documento') is-invalid @enderror solo_numeros"  name="documento" id="documento">
                                            @error('documento')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror <label class="validacion" for="documento" id="valDocumento"></label></div>

                                    </div>
                                </div>
                                <div id="step-3" class="">
                                    <div class="row">
                                        <div class="col-md-6"><label for="">Telefono #1</label>
                                            <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                                            @error('telefono1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="telefono1" id="valTelefono1"></label>
                                        </div>
                                        <div class="col-md-6"> <label for="">Teléfono #2</label>
                                            <input type="number" class="form-control @error('telefono2') is-invalid @enderror"  name="telefono2" id="telefono2">
                                            @error('telefono2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="telefono2" id="valTelefono2"></label>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">  <label for="">Correo #1</label>
                                            <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                                            @error('correo1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror <label class="validacion" for="correo1" id="valCorreo1"></label></div>
                                        <div class="col-md-6"> <label for="">Correo #2</label>
                                            <input type="text" class="form-control @error('correo2') is-invalid @enderror"  name="correo2" id="correo2">
                                            @error('correo2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="correo2" id="valCorreo2"></label>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="crearContacto" class="btn btn-primary">Crear Contacto</button>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" data-backdrop="static"  tabindex="-1" aria-labelledby="exampleModal3" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Lista Tipos De Contactos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="card-header">
                            <strong>x</strong>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                        @include('flash::message')
                            <table id="tbl_tipocontacto" class="table table-bordered" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tipo Contacto</th>
                                    <th>Fecha Creación</th>
                                    <th>Editar</th>
                                    <th>eliminar</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="exampleModal4" data-backdrop="static"  tabindex="-1" aria-labelledby="exampleModal4" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="clienteCrudModal"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="card-header">
                            <strong>x</strong>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                        <form class="editContact" name="clienteForm" action="/cliente/guardar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cliente_id" id="cliente_id" >

                            <div class="row">
                            <div class="col-6">

                                    <div class="form-group">
                                        <label for="">Tipo Contacto</label>
                                        <select class="form-control @error('idtipocontacto') is-invalid @enderror" name="cidtipocontacto" id="cidtipocontacto" onchange="validate()">
                                            <option value="">Seleccione</option>
                                            @foreach($tipoContacto as $key =>$value)
                                                <option value="{{ $value->id }}">{{ $value->tipocontacto}}</option>
                                            @endforeach
                                        </select>
                                        @error('idtipocontacto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="cnombre" id="cnombre" onchange="validate()">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Primer Apellido</label>
                                        <input type="text" class="form-control @error('apellido1') is-invalid @enderror"  name="capellido1" id="capellido1" onchange="validate()">
                                        @error('apellido1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text" class="form-control @error('apellido2') is-invalid @enderror"  name="capellido2" id="capellido2" onchange="validate()">
                                        @error('apellido2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Documento</label>
                                        <input type="number" class="form-control @error('documento') is-invalid @enderror"  name="cdocumento" id="cdocumento" onchange="validate()">
                                        @error('documento')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Telefono #1</label>
                                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="ctelefono1" id="ctelefono1" onchange="validate()">
                                        @error('telefono1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Teléfono #2</label>
                                        <input type="number" class="form-control @error('telefono2') is-invalid @enderror"  name="ctelefono2" id="ctelefono2" onchange="validate()">
                                        @error('telefono2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Correo #1</label>
                                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="ccorreo1" id="ccorreo1" onchange="validate()">
                                        @error('correo1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                        <label for="">Correo #2</label>
                                        <input type="text" class="form-control @error('correo2') is-invalid @enderror"  name="ccorreo2" id="ccorreo2" onchange="validate()">
                                        @error('correo2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                </div>
                            </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Guardar</button>
                                    <a href="/cliente" class="btn btn-danger">Cancelar</a>
                                </div>
                            </form>
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
        $('#tbl_contacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/cliente/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id'
                    },
                    {
                     data: 'idtipocontacto',
                     name: 'idtipocontacto',
                     orderable: false,
                     searchable: false
                    },
                    {
                     data: 'nombre',
                     name: 'nombre'
                    },
                    {
                        data: 'apellido1',
                        name: 'apellido1'
                    },
                    {
                        data: 'apellido2',
                        name: 'apellido2'
                    },
                    {
                        data: 'estado',
                        name: 'estado'
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
                ]
            });

            $('#tbl_tipocontacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/tipocontacto/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id'
                    },
                    {
                     data: 'tipocontacto',
                     name: 'tipocontacto'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
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
                    }
                ]
            });

            $('body').on('click', '#editar-Cliente', function () {
                var cliente_id = $(this).data('id');
                $.get('cliente/'+cliente_id+'/edit', function (data) {
                $('#clienteCrudModal').html("Editar Cliente");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#exampleModal4').modal('show');
                $('#cliente_id').val(data.id);
                $('#cidtipocontacto').val(data.idtipocontacto);
                $('#cnombre').val(data.nombre);
                $('#capellido1').val(data.apellido1);
                $('#capellido2').val(data.apellido2);
                $('#cdocumento').val(data.documento);
                $('#cestado').val(data.estado);
                $('#ctelefono1').val(data.telefono1);
                $('#ctelefono2').val(data.telefono2);
                $('#ccorreo1').val(data.correo1);
                $('#ccorreo2').val(data.correo2);

            })
            });

        function validate()
        {
            if(document.clienteForm.cidtipocontacto.value !='' && document.clienteForm.cnombre.value !='' && document.clienteForm.capellido1.value !=''
            && document.clienteForm.capellido2.value !='' && document.clienteForm.cdocumento.value !='' && document.clienteForm.ctelefono1.value !=''
            && document.clienteForm.ctelefono2.value !='' && document.clienteForm.ccorreo1.value !='' && document.clienteForm.ccorreo2.value !='')
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
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
    <script src="{{ asset('js/validacionTipoContacto.js') }}"></script>
    <script src="{{ asset('js/validacionCliente.js') }}"></script>
@endsection


