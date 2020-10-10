@extends('layouts.app')

@section('body')
<div class="contariner">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear contactos de obra</strong>
            <strong class="float-right"><a class="btn btn-outline-light float-rigth"  href="/obracontacto/listar">Listar contactos de obra</a></strong>
        </div>
        <div class="card-body">
            <form action="/obracontacto/guardar" method="POST" id="formObraContacto" name="formObraContacto">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>1. Información de obra</h4>
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
                                        <label for="">Teléfono</label>
                                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1" value="{{old('telefono1')}}">
                                        @error('telefono1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="telefono1" id="valTelefono1"></label>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Correo electrónico</label>
                                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1" value="{{old('correo1')}}">
                                        @error('correo1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="correo1" id="valCorreo1"></label>
                                    </div>
                                    <div class="col-12" align="center">
                                        <button type="button" id="crearObraContacto" class="btn btn-success">Crear</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>2. Información del contacto</h4>
                            </div>
                            <div class="row card-body">
                                    <div class="form-group col-6">
                                        <label for="">Seleccione contacto</label>
                                            <select name="contactos" id="contactos" class="form-control" onchange="dartipo()">
                                            <option value="0">Seleccione</option>
                                            @foreach($cliente as $value)
                                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <label class="validacion" for="contactos" id="valContactos"></label>
                                    </div>
                                    <div class="form-group col-6">
                                    <label for="">Seleccione tipo de contacto</label>
                                    <!-- <input type="text" id="tipoContacto" readonly> -->
                                            <select name="tipocontacto" id="tipoContacto" class="form-control" readonly>
                                            <option value="0"></option>
                                            @foreach($cliente as $value)
                                            <option value="{{ $value->id }}">{{ $value->tipocontacto }}</option>
                                            @endforeach
                                        </select>
                                        <label class="validacion" for="contactos" id="valContactos"></label>
                                    </div>
                                    <div class="col-12" align="center">
                                    <button type="button" class="btn btn-success" onclick="agregar_contacto()">Agregar</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                            <th>Nombre</th>
                                            <th>Quitar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblContactos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionObraContacto.js') }}"></script>
@endsection

