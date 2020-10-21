@extends('layouts.app')

@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear obra</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/obra/guardar" id="frmCreateObra" name="frmCreateObra" method="POST">
        @csrf
        <input type="hidden" name="idempresa" id="idempresa" value="{{ $id }}">
            <div class="row">
            <div class="col-6">

                    <div class="form-group">
                        <label for="">Nombre obra</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre"value="{{old('nombre')}}" onchange="validate()" onkeypress="return soloLetras(event)">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valNombre" id="valNombre"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion" value="{{old('direccion')}}">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valDireccion" id="valDireccion"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1" value="{{old('telefono1')}}" onkeypress="return soloNumeros(event)">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valTelefono1" id="valTelefono1"></label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo electrónico</label>
                        <input type="email" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1" value="{{old('correo1')}}">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valCorreo1" id="valCorreo1"></label>
                    </div>
                </div>
                </div>
            </div>
           <div class="col-12 margen">
                <button type="submit" class="btn btn-success float-right" id="">Guardar</button>
           </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionObra.js') }}"></script>
@endsection
