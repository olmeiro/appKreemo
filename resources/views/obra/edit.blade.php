@extends('layouts.app')

@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Editar Obra</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/obra/actualizar" id="frmEditarObra" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$obra->id}}"/>
        <input value="{{$obra->idempresa}}" type="hidden" class="form-control @error('nombre') is-invalid @enderror"  name="idempresa" id="idempresa">

            <div class="row">
              
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input value="{{$obra->nombre}}" type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valNombre" id="valNombre"></label>
                    </div>
                </div>

                

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <input value="{{$obra->direccion}}" type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valDireccion" id="valDireccion"></label>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="">Telefono #1</label>
                        <input value="{{$obra->telefono1}}" type="text" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valTelefono1" id="valTelefono1"></label>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #1</label>
                        <input value="{{$obra->correo1}}" type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="valCorreo1" id="valCorreo1"></label>
                    </div>
                </div>


            </div>
            <div class="col 12">
                <button type="submit" class="btn btn-success float-lg-right" id="crearObra">Actualizar</button>
                <a href="/obra" class="btn btn-primary float-lg-right" style="margin-right: 10px;">Listar obras</a>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionObra.js') }}"></script>
@endsection
