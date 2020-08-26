@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Operario</strong>
            <a href="/operario" class="btn btn-link">Volver</a>
            <!-- <a href="/tipocontacto/listar" class="btn btn-link">Listar Contacto</a> -->
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/operario/guardar" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror"  name="apellido" id="apellido">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Documento</label>
                        <input type="text" class="form-control @error('documento') is-invalid @enderror"  name="documento" id="documento">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Celular</label>
                        <input type="text" class="form-control @error('celular') is-invalid @enderror"  name="celular" id="celular">
                    </div>
                </div>

                </div>
            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>
        </div>
    </div>
@endsection
