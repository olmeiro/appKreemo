@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear Estado</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/estadocotizacion/guardar" method="POST" name="FrmCrearEstado" id="FrmCrearEstado">
            @csrf
                <div class="form-row" >

                    <div class="form-group col-md-12">
                        <label for="">Estado</label>
                        <label class="validacion" id="val_estado_coti"></label>
                        <input type="text" class="form-control @error('Estado_Cotizacion') is-invalid @enderror " id="Estado_Cotizacion" name="Estado_Cotizacion" onkeypress="return soloLetras(event)">
                        @error('Estado_Cotizacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_estado_coti2"></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Crear Estado</button>
                <a href="/estadocotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
<br>

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
    <script src="{{ asset('js/validacionEstadoCotizacion.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
