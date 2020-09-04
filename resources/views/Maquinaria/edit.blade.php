@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card ">
        <div class="card-header text-white" style="background-color: black">
            <strong>Modificar Maquina</strong>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/maquinaria/actualizar" method="POST" enctype="multipart/form-data" name="FrmEditarMaquinaria" id="FrmEditarMaquinaria">
        @csrf
        <input type="hidden" name="id" value="{{$maquinaria->id}}"/>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Serial Equipo</label>
                        <label class="validacion" id="validacion_serialequipo"></label>
                        <input value="{{$maquinaria->serialequipo}}" type="text" class="form-control @error('serialequipo') is-invalid @enderror solo_numeros"  name="serialequipo" id="serialequipo">
                        @error('serialequipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            <label class="validacion" id="validacion_serialequipo2"></label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Modelo</label>
                        <label class="validacion" id="validacion_modelo"></label>
                        <input value="{{$maquinaria->modelo}}" type="text" class="form-control @error('modelo') is-invalid @enderror solo_letras"  name="modelo" id="modelo" onkeypress="return soloLetras(event)">
                        @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="validacion_modelo2"></label>
                    </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Serial Motor</label>
                        <label class="validacion" id="validacion_serialmotor"></label>
                        <input value="{{$maquinaria->serialmotor}}" type="text" class="form-control @error('serialmotor') is-invalid @enderror"  name="serialmotor" id="serialmotor">
                        @error('serialmotor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="validacion_serialmotor2"></label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Observación</label>
                        <label class="validacion" id="validacion_observacion"></label>
                        <input value="{{$maquinaria->observacion}}" type="text" class="form-control @error('observacion') is-invalid @enderror solo_letras"  name="observacion" id="observacion" onkeypress="return soloLetras(event)">
                        @error('observacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="validacion_observacion2"></label>
                    </div>
            </div>
            <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
            <a href="/maquinaria" class="btn btn-outline-primary float-right" >Volver</a>
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
<script src="{{ asset('js/validacionMaquinaria.js') }}"></script>
@endsection


