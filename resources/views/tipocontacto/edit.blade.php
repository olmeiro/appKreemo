@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Modificar Tipo Contacto</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/tipocontacto/actualizar" method="POST">
        @csrf  
        <input type="hidden" name="id" value="{{$tipoContacto->id}}"/>
            <div class="row">  
            <div class="col-6">
                    
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tipo Contacto</label>
                        <input value="{{$tipoContacto->tipocontacto}}" type="text" class="form-control @error('tipocontacto') is-invalid @enderror"  name="tipocontacto" id="tipocontacto">
                        @error('tipocontacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>   
        </div>
    </div>
@endsection