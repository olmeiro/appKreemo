@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear Operario</strong>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
            <form action="/operario/guardar" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <input value="{{old('nombre')}}" type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Apellido</label>
                            <input value="{{old('apellido')}}" type="text" class="form-control @error('apellido') is-invalid @enderror"  name="apellido" id="apellido">
                            @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Documento</label>
                            <input value="{{old('documento')}}" type="text" class="form-control @error('documento') is-invalid @enderror"  name="documento" id="documento">
                            @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Celular</label>
                            <input value="{{old('celular')}}" type="text" class="form-control @error('celular') is-invalid @enderror"  name="celular" id="celular">
                            @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
                <a href="/operario" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
