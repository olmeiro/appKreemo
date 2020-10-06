@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Editar servicio</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/servicio/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$servicio->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-4">
                        <label for="">N° del servicio</label>
                        <input value="{{$servicio->id}}" type="text" Readonly class="form-control @error('id') is-invalid @enderror" name="id" id="id">
                        @error('id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">N° Cotización</label>
                            <select id="idcotizacion"  name= "idcotizacion" class="form-control @error('idcotizacion') is-invalid @enderror" >
                            <option selected>Seleccione</option>
                            @foreach($cotizacion as $key =>$value)
                                <option {{$value->id == $servicio->idcotizacion ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->id}}</option>
                            @endforeach
                        </select>
                            @error('idcotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Estado del servicio</label>
                        <select id="idestadoservicio"  name= "idestadoservicio" class="form-control @error('idestadoservicio') is-invalid @enderror" >
                            <option selected>Seleccione</option>
                            @foreach($estadoservicio as $key =>$value)
                                <option {{$value->id == $servicio->idestadoservicio ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->estado}}</option>
                            @endforeach
                        </select>
                        @error('idestadoservicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="">Fecha: fnicio del servicio</label>
                        <input value="{{$servicio->fechainicio}}" type="date" class="form-control @error('fechainicio') is-invalid @enderror" id="fechainicio" name="fechainicio">
                        @error('fechainicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Fecha: fin del servicio</label>
                        <input value="{{$servicio->fechafin}}" type="date" class="form-control @error('fechafin') is-invalid @enderror" id="fechafin" name="fechafin" >
                        @error('fechafin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Editar Servicio</button>
                <a href="/servicio" class="btn btn-outline-primary" >Volver</a>
            </form>
        </div>
    </div>
</div>
<br>

</body>
@endsection
