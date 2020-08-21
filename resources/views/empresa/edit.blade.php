@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Actualizar Empresa</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/empresa/actualizar" method="POST">
        @csrf  
        <input type="hidden" name="id" value="{{$empresa->id}}"/>
            <div class="row">          
                <div class="col-6">
                    <div class="form-group">
                        <label for="">NIT</label>
                        <input value="{{$empresa->nit}}" type="text" class="form-control @error('nit') is-invalid @enderror"  name="nit" id="nit">
                        @error('nit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input value="{{$empresa->nombre}}" type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre Representante</label>
                        <input value="{{$empresa->nombrerepresentante}}" type="text" class="form-control @error('nombrerepresentante') is-invalid @enderror"  name="nombrerepresentante" id="nombrerepresentante">
                        @error('nombrerepresentante')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input value="{{$empresa->direccion}}" type="text" class="form-control @error('documento') is-invalid @enderror"  name="direccion" id="direccion">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Telefono #1</label>
                        <input value="{{$empresa->telefono1}}" type="text" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #1</label>
                        <input value="{{$empresa->correo1}}" type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                        @error('correo1')
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