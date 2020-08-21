@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Editar Obra</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/obra/actualizar" method="POST">
        @csrf  
        <input type="hidden" name="id" value="{{$obra->id}}"/>
            <div class="row">  
            <div class="col-6">
                     
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input value="{{$obra->nombre}}" type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <input value="{{$obra->direccion}}" type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="">Telefono #1</label>
                        <input value="{{$obra->telefono1}}" type="text" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

         
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #1</label>
                        <input value="{{$obra->correo1}}" type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
         

                </div>
            </div>
            <button type="submit" class="btn btn-success float-lg-right">Actualizar</button>
            </form>   
        </div>
    </div>
@endsection