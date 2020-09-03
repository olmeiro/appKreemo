@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Cambio de Estado</strong>

        </div>
        <div class="card-body">
        @include('flash::message')
        <strong>Cotizacion N° {{$cotizacion->id}}</strong>
        <br>
            <form class="form-signin col-md-12" action="/cotizacion/estado" method="POST" name="FrmEditarEstadoCotizacion">
            @csrf
            <input type="hidden" name="id" value="{{$cotizacion->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-8">
                        <label for="">Estado</label>
                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                            <option value="">Seleccione Estado</option>
                            @foreach($estadocotizacion as $key =>$value)
                                <option {{$value->id == $cotizacion->idEstado ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->estado_cotizacion}}</option>
                            @endforeach
                        </select>
                        @error('IdEstado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Cambiar Estado</button>
                <a href="/cotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
