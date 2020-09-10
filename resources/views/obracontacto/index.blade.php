@extends('layouts.app')

@section('body')
 <div class="row">
    <div class="col" style="padding: 15px">
        <h3>Crear Contactos De Obra</h1>
        <a class="btn btn-info"  href="/obracontacto/listar">Listar</a>
    </div>
</div>
<form action="/obracontacto/guardar" method="POST" id="formObraContacto" name="formObraContacto">
    @csrf
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>1. Información Obra</h2>
            </div>
            <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre"value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="nombre" id="valNombre"></label>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion" value="{{old('direccion')}}">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="direccion" id="valDireccion"></label>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Telefono</label>
                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1" value="{{old('telefono1')}}">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="telefono1" id="valTelefono1"></label>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Correo Electrónico</label>
                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1" value="{{old('correo1')}}">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" for="correo1" id="valCorreo1"></label>
                    </div>
                    <div class="col-12" style="margin-top: 5%">
                        <button type="button" id="crearObraContacto" class="btn btn-primary btn-block">Guardar</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>2. Información del contacto</h2>
            </div>
            <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="">Seleccione Contacto</label>
                            <select name="contactos" id="contactos" class="form-control" onchange="dartipo()">
                            <option value="0">Seleccione  Contacto</option>
                            @foreach($cliente as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                        <label class="validacion" for="contactos" id="valContactos"></label>
                    </div>
                    <div class="form-group col-6">
                    <label for="">Seleccione tipo de contacto</label>
                            <select name="tipocontacto" id="tipoContacto" class="form-control">
                            <option value="0">Seleccione  Contacto</option>
                            @foreach($cliente as $idtipocontacto)
                            <option value="{{ $value->id }}">{{ $value->tipocontacto }}</option>
                            @endforeach
                        </select>
                        <label class="validacion" for="contactos" id="valContactos"></label>
                    </div>
            
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" onclick="agregar_contacto()" >Agregar</button>
                </div>
            </div>
            <table class="table">
                <thead>
                        <th>Nombre</th>
                        <th>Id Tipo Contacto</th>
                    </tr>
                </thead>
                <tbody id="tblContactos">

                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
@endsection

@section('style')
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>    
    <script src="{{ asset('js/validacionObraContacto.js') }}"></script>
@endsection

