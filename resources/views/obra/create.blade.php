@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Obra</strong>
            <a href="/obra/crearcontactos" class="btn btn-link">Crear Contactos Obra</a>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/obra/guardar" method="POST">
        @csrf  
            <div class="row">  
            <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
      
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo Electrónico</label>
                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
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