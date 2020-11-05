@extends('layouts.app')

@section('body')
<div class="container justify-content-center col-md-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B"">
            <strong>Generar reporte cotización</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/cotizacion/generar/pdf" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Número de cotización</label>
                        <select id="id"  name= "id"  class="form-control">
                            <option selected>Seleccione una cotización</option>
                            @foreach($cotizacion as $key =>$value)
                                <option value="{{ $value->id }}">Cotización N° {{ $value->id}} Empresa {{ $value->nombre_empresa}} - Obra: {{ $value->nombre_obra}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Descargar cotización</button>
            </form>
        </div>
    </div>
</div>


@endsection
