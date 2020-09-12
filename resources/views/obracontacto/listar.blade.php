@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">

        <div class="card-header text-white" style="background-color: #616A6B">
                    <strong>Obras</strong>
                    <strong class="float-right"><a type="button" class="btn btn-outline-light float-rigth" href="/obracontacto">Crear Contactos de Obra</a></strong>
                        @if (session('status'))
                        @if(session('status') == '1')
                            <div class="alert alert-success">
                                Se guardo correctamente
                            </div>
                            @else
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                            @endif
                        @endif
        </div>
        <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre obra</th>
                                <th>Dirrección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obras as $value)
                                <tr>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->direccion }}</td>
                                    <td>{{ $value->telefono1 }}</td>
                                    <td>{{ $value->correo1 }}</td>
                                    <td>
                                    <a class="btn btn-info" href="/obracontacto/listar?id={{ $value->id }}">Ver</a>
                                        <!-- <button type="button" class="btn btn-info-light float-right" data-toggle="modal" data-target="#exampleModal3"><a class="btn btn-info" href="/obracontacto/listar?id={{ $value->id }}">Ver</a> </button> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

        </div>
    </div>
</div>
        @if(count($contactos) > 0)
    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Información Contactos de Obra</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="5" class="text-center">Contactos</th>
                        </tr>
                        <tr>
                            <th>Tipo Contacto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactos as $value)
                        <tr>
                            <td>{{ $value->tipocontacto}}</td>
                            <td>{{ $value->nombre }}</td>
                            <td>{{ $value->apellido1 }}</td>
                            <td>{{ $value->telefono1 }}</td>
                            <td>{{ $value->correo1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Contactos</th>
                        </tr>
                        <tr>
                            <th>Tipo Contacto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactos as $value)
                        <tr>
                            <td>{{ $value->tipocontacto}}</td>
                            <td>{{ $value->nombre }}</td>
                            <td>{{ $value->apellido1 }}</td>
                            <td>{{ $value->telefono1 }}</td>
                            <td>{{ $value->correo1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> -->

        <!-- <div class="modal fade" id="exampleModal3" data-backdrop="static"  tabindex="-1" aria-labelledby="exampleModal3" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-color: #616A6B">
                        <h4>Lista Contactos de Obra</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <div class="card-header">
                            <strong>x</strong>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                        @include('flash::message')
                        <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Contactos</th>
                        </tr>
                        <tr>
                            <th>Tipo Contacto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactos as $value)
                        <tr>
                            <td>{{ $value->tipocontacto}}</td>
                            <td>{{ $value->nombre }}</td>
                            <td>{{ $value->apellido1 }}</td>
                            <td>{{ $value->telefono1 }}</td>
                            <td>{{ $value->correo1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div> -->
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
@endsection
