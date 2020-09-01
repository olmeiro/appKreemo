@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Crear Maquina</strong>
                <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/maquinaria/guardar" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Serial Equipo</label>
                            <input value="{{old('serialequipo')}}" type="text" class="form-control @error('serialequipo') is-invalid @enderror"  name="serialequipo" id="serialequipo">
                            @error('serialequipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Modelo</label>
                            <input value="{{old('modelo')}}" type="text" class="form-control @error('modelo') is-invalid @enderror"  name="modelo" id="modelo">
                            @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Serial Motor</label>
                            <input value="{{old('serialmotor')}}" type="text" class="form-control @error('serialmotor') is-invalid @enderror"  name="serialmotor" id="serialmotor">
                            @error('serialmotor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Observación</label>
                            <input value="{{old('observacion')}}" type="text" class="form-control @error('observacion') is-invalid @enderror"  name="observacion" id="observacion">
                            @error('observacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
                <a href="/maquinaria" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection

