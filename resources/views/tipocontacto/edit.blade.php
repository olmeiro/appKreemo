@extends('layouts.app')

@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section('body')
<div class="container justify-content-center col-md-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Modificar Tipo Contacto</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <strong>Contacto N° {{$tipoContacto->id}}</strong>
        <form action="/tipocontacto/actualizar" method="POST" id="frmeditTipoContacto">
            @csrf
            <input type="hidden" name="id" value="{{$tipoContacto->id}}"/>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Tipo Contacto</label>
                    <input value="{{$tipoContacto->tipocontacto}}" type="text" class="form-control @error('tipocontacto') is-invalid @enderror"  name="tipocontacto" id="tipocontacto">
                    @error('tipocontacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="validacion" for="tipocontacto" id="valTipoContacto"></label>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right" id="editTipoCotacto">Editar</button>
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
