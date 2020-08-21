@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Contacto</strong>
            <a href="/cliente/crear" class="btn btn-link">Crear Contacto</a>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/cliente/guardar" method="POST" enctype="multipart/form-data">
        @csrf  
            <div class="row">  
            <div class="col-6">
            
                    <div class="form-group">
                        <label for="">Tipo Contacto</label>
                        <select class="form-control @error('idtipocontacto') is-invalid @enderror" name="idtipocontacto" id="idtipocontacto">
                            <option value="">Seleccione</option>
                            @foreach($tipoContacto as $key =>$value)
                                <option value="{{ $value->id }}">{{ $value->tipocontacto}}</option>
                            @endforeach
                        </select>   
                        @error('idtipocontacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror                 
                    </div>
            
                </div>          

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
                        <label for="">Primer Apellido</label>
                        <input type="text" class="form-control @error('apellido1') is-invalid @enderror"  name="apellido1" id="apellido1">
                        @error('apellido1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Segundo Apellido</label>
                        <input type="text" class="form-control @error('apellido2') is-invalid @enderror"  name="apellido2" id="apellido2">
                        @error('apellido2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Documento</label>
                        <input type="number" class="form-control @error('documento') is-invalid @enderror"  name="documento" id="documento">
                        @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Telefono #1</label>
                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Teléfono #2</label>
                        <input type="number" class="form-control @error('telefono2') is-invalid @enderror"  name="telefono2" id="telefono2">
                        @error('telefono2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #1</label>
                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Correo #2</label>
                        <input type="text" class="form-control @error('correo2') is-invalid @enderror"  name="correo2" id="correo2">
                        @error('correo2')
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