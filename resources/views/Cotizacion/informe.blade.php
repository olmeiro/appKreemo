@extends('layouts.app')

@section('body')
<div class="container justify-content-center col-md-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B"">
            <strong>Generar Reporte Cotización</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/cotizacion/generar/pdf" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Numero de Cotización</label>
                        {{-- <input type="text" class="form-control" name="id"> --}}
                        <select id="id"  name= "id"  class="form-control">
                            <option selected>Seleccione una Cotización</option>
                            @foreach($cotizacion as $key =>$value)
                                <option value="{{ $value->id }}">{{ $value->nombre_empresa}} - Obra: {{ $value->nombre_obra}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-left">Generar Informe</button>
            </form>
        </div>
    </div>
</div>


@endsection
