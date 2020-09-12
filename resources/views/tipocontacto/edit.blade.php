@extends('layouts.app')

@section('body')
<div class="container justify-content-center col-md-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Modificar Tipo Contacto</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <strong>Contacto N° {{$tipoContacto->id}}</strong>
        <form action="/tipocontacto/actualizar" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$tipoContacto->id}}"/>
            <div class="form-row">
                <div class="form-group col-md-12">


                            <label for="">Tipo Contacto</label>
                            <input value="{{$tipoContacto->tipocontacto}}" type="text" class="form-control @error('tipocontacto') is-invalid @enderror"  name="tipocontacto" id="tipocontacto">
                            @error('tipocontacto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                </div>
            </div>
            <button type="submit" class="btn btn-success float-left">Guardar</button>
            <a href="/tipocontacto" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
