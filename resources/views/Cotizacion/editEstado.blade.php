@extends('layouts.app')

@section('body')
<div class="container justify-content-center col-md-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Cambio de estado</strong>

        </div>
        <div class="card-body">
        @include('flash::message')
        <strong>Cotización N° {{$cotizacion->id}}</strong>
        <br>
            <form class="form-signin col-md-12" action="/cotizacion/estado" method="POST" name="FrmEditarEstadoCotizacion" id="FrmEditarEstadoCotizacion">
            @csrf
            <input type="hidden" name="id" value="{{$cotizacion->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-12">
                        <label for="">Estado</label>
                        <label class="validacion" id="val_IdEstado"></label>
                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                            <option value="0">Seleccione estado</option>
                            @foreach($estadocotizacion as $key =>$value)
                                <option {{$value->id == $cotizacion->idEstado ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->estado_cotizacion}}</option>
                            @endforeach
                        </select>
                        @error('IdEstado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_IdEstado2"></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Cambiar estado</button>
                <a href="/cotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
@section('style')
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection
@section("scripts")

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionEditarEstadoCotizacion.js') }}"></script>

@endsection


