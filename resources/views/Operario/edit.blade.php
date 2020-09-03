@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Modificar Operario</strong>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
            <form action="/operario/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$operario->id}}">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <input value="{{$operario->nombre}}" type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Apellido</label>
                            <input value="{{$operario->apellido}}" type="text" class="form-control @error('apellido') is-invalid @enderror"  name="apellido" id="apellido">
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Documento</label>
                            <input value="{{$operario->documento}}" type="text" class="form-control @error('documento') is-invalid @enderror"  name="documento" id="documento">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Celular</label>
                            <input value="{{$operario->celular}}" type="text" class="form-control @error('celular') is-invalid @enderror"  name="celular" id="celular">
                        </div>
                </div>
                <button type="submit" class="btn btn-success float-lg-left">Guardar</button>
                <a href="/operario" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
