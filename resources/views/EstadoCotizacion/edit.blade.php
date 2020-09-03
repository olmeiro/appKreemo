@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Editar Estado</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <strong>Estado N° {{$estadocotizacion->id}}</strong>
            <form class="form-signin col-md-12" action="/estadocotizacion/actualizar" method="POST" name="FrmEditarEstado">
            @csrf
            <input type="hidden" name="id" value="{{$estadocotizacion->id}}"/>
                <div class="form-row" >

                    <div class="form-group col-md-12">
                        <label for="">Estado</label>
                        <input value="{{$estadocotizacion->estado_cotizacion}}" type="text" class="form-control @error('Estado_Cotizacion') is-invalid @enderror " id="Estado_Cotizacion" name="Estado_Cotizacion">
                        @error('Estado_Cotizacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <button type="submit" class="btn btn-success float-left">Crear Estado</button>
                <a href="/estadocotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>

</body>
@endsection
