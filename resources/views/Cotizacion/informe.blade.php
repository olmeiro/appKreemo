@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B"">
            <strong>Generar Reporte Contización</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/cotizacion/generar/pdf" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Numero de Cotización</label>
                        <input type="text" class="form-control" name="txtNumeroCotizacion">
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Generar Informe</button>
            </form>
        </div>
    </div>
</div>


@endsection
