@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Modificar Operario</strong>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
            <form action="/operario/actualizar" method="POST" enctype="multipart/form-data" name="FrmCrearOperario" id="FrmCrearOperario">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$operario->id}}">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <label class="validacion" id="validacion_nombre"></label>
                            <input value="{{$operario->nombre}}" type="text" class="form-control @error('nombre') is-invalid @enderror solo_letras"  name="nombre" id="nombre" onkeypress="return soloLetras(event)">
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_nombre2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Apellido</label>
                            <label class="validacion" id="validacion_apellido"></label>
                            <input value="{{$operario->apellido}}" type="text" class="form-control @error('apellido') is-invalid @enderror solo_letras"  name="apellido" id="apellido" onkeypress="return soloLetras(event)">
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
                            <input value="{{$operario->documento}}" type="text" class="form-control @error('documento') is-invalid @enderror solo_numeros"  name="documento" id="documento" onkeypress="return soloNumeros(event)">
                            @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_documento2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Celular</label>
                            <label class="validacion" id="validacion_celular"></label>
                            <input value="{{$operario->celular}}" type="text" class="form-control @error('celular') is-invalid @enderror solo_numeros"  name="celular" id="celular" onkeypress="return soloNumeros(event)">
                            @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_celular2"></label>
                        </div>
                </div>
                <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
                <a href="/operario" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
@section('style')
<link href="{{ asset('css/styleMaquiOperario.css') }}" rel="stylesheet">
@endsection

@section("scripts")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/validacionOperario.js') }}"></script>
@endsection
