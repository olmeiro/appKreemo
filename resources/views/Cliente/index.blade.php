@extends('layouts.app')

@section('body')

    <div class="card">
        <div class="card-header">
            <strong>Contactos</strong>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Crear Tipo Contacto </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Crear Contacto </button>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_contacto" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>Tipo Contacto</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Documento</th>
                    <th>Estado</th>
                    <th>Telefono 1</th>
                    <th>Correo 1</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
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
                    <form class="col-md-12" action="" method="POST" id="frmTipoContacto">
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
                                            <select class="form-control @error('idtipocontacto') is-invalid @enderror" name="contacto" id="contacto">
                                                <option value="0">Seleccione</option>
                                                @foreach($tipoContacto as $key =>$value)
                                                    <option value="{{ $value->id }}">{{ $value->tipocontacto}}</option>
                                                @endforeach
                                            </select>
                                            @error('idtipocontacto')
                                                <div class="invalid-feedback">{{ $message }} ></div>
                                            @enderror
                                            <label class="validacion" for="contacto" id="valContacto"></label>
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
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <button type="button" id="crearContacto" class="btn btn-primary">Crear Contacto</button>
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
                     data: 'tipocontacto',
                     name: 'tipocontacto',
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
                    }
                ]
            });

    </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
    <script src="{{ asset('js/validacionTipoContacto.js') }}"></script>
    <script src="{{ asset('js/validacionCliente.js') }}"></script>
@endsection

