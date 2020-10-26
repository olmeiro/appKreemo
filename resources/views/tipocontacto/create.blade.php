@extends('layouts.app')

@section('style')

    <link href="{{ asset('css/styleListaChequeo.css') }}" rel="stylesheet">
@endsection

@section('body')
<div class="container justify-content-center col-md-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear tipo contacto</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/tipocontacto/guardar" method="POST" id="frmTipoContacto">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Tipo Contacto</label>
                    <input type="text" class="form-control @error('tipocontacto') is-invalid @enderror"  name="tipocontacto" id="tipocontacto" onkeypress="return soloLetras(event)">
                    @error('tipocontacto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="validacion" for="tipocontacto" id="valTipoContacto"></label>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-lg-right" id="creaTipoContacto">Crear</button>
            <a href="/tipocontacto" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionTipoContacto.js') }}"></script>
@endsection

