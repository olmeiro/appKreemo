@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card col-md-4">
        <div class="card-header">
            <strong>Crear Estado</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/estadocotizacion/guardar" method="POST" name="FrmCrearEstado">
            @csrf
                <div class="form-row" >

                    <div class="form-group col-md-12">
                        <label for="">Estado</label>
                        <input type="text" class="form-control @error('Estado_Cotizacion') is-invalid @enderror " id="Estado_Cotizacion" name="Estado_Cotizacion">
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
<br>

</body>
@endsection
