@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Editar estado</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <strong> N° {{$estadocotizacion->id}}</strong>
            <form class="form-signin col-md-12" action="/estadocotizacion/actualizar" method="POST" name="FrmEditarEstado" id="FrmEditarEstado">
            @csrf
                <input type="hidden" name="id" value="{{$estadocotizacion->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-12">
                        <label for="">Estado</label>
                        <input value="{{$estadocotizacion->estado_cotizacion}}" type="text" class="form-control @error('Estado_Cotizacion') is-invalid @enderror " onkeypress="return soloLetras(event)" id="Estado_Cotizacion" name="Estado_Cotizacion">
                        @error('Estado_Cotizacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Editar</button>
                <a href="/estadocotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>

</body>
@endsection
@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection
@section("scripts")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/validacionEditarEstadoCotizacion.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
