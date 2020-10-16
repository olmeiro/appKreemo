@extends('layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear Contacto</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form class="form-signin col-md-12" action="/cliente/guardar" method="POST" name="" id="frmCrearContacto">
        @csrf
        <input type="hidden" name="idobra" id="idobra" value="{{ $id }}">
            <div class="row">
            <div class="col-6">

                    <div class="form-group">
                        <label for="">Tipo Contacto</label>
                        <select class="form-control @error('idtipocontacto') is-invalid @enderror" name="idtipocontacto" id="idtipocontacto">
                            <option value="">Seleccione</option>
                            @foreach($tipoContacto as $key =>$value)
                                <option value="{{ $value->id }}">{{ $value->tipocontacto}}</option>
                            @endforeach
                        </select>
                        @error('idtipocontacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="idtipocontacto" id="valContacto"></label>
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre" onkeypress="return soloLetras(event)">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="nombre" id="valNombre"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Primer Apellido</label>
                        <input type="text" class="form-control @error('apellido1') is-invalid @enderror"  name="apellido1" id="apellido1" onkeypress="return soloLetras(event)">
                        @error('apellido1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="apellido1" id="valApellido1"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Segundo Apellido</label>
                        <input type="text" class="form-control @error('apellido2') is-invalid @enderror"  name="apellido2" id="apellido2" onkeypress="return soloLetras(event)">
                        @error('apellido2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="apellido2" id="valApellido2"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Documento</label>
                        <input type="number" class="form-control @error('documento') is-invalid @enderror solo_numeros"  name="documento" id="documento">
                        @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="documento" id="valDocumento"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Telefono #1</label>
                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror solo_numeros"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="telefono1" id="valTelefono1"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Teléfono #2</label>
                        <input type="number" class="form-control @error('telefono2') is-invalid @enderror solo_numeros"  name="telefono2" id="telefono2">
                        @error('telefono2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="telefono2" id="valTelefono2"></label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #1</label>
                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="correo1" id="valCorreo1"></label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #2</label>
                        <input type="text" class="form-control @error('correo2') is-invalid @enderror"  name="correo2" id="correo2">
                        @error('correo2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="correo2" id="valCorreo2"></label>
                    </div>
                </div>

                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" id="crearObra" id="crearContacto" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionCliente.js') }}"></script>
@endsection
