@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Modificar Estado</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/estadoservicio/actualizar" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$estadoservicio->id}}"/>
            <div class="row">
            <div class="col-6">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tipo de Estado</label>
                        <input value="{{$estadoservicio->estado}}" type="text" class="form-control @error('estado') is-invalid @enderror"  name="estado" id="estado">
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/estadoservicio" class="btn btn-outline-primary" >Volver</a>
            </form>
        </div>
    </div>
@endsection
