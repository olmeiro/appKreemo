@extends('layouts.app')

@section('body')
    <div class="row">
        <div class="col">
            <h4 class="text-center">Obras</h4>
            <a href="/obracontacto/crear">Crear</a>
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
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Id empresa</th>
                        <th>Nombre obra</th>
                        <th>Dirrección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Insumos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obras as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->idempresa}}</td>
                            <td>{{ $value->nombre }}</td>
                            <td>{{ $value->direccion }}</td>
                            <td>{{ $value->telefono1 }}</td>
                            <td>{{ $value->correo1 }}</td>
                            <td>
                                <a class="btn btn-info" href="/obracontacto/listar?id={{ $value->id }}">Ver</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if(count($contactos) > 0)
        <div class="row">
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
                            <td>{{ $value->contactos}}</td>
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
    @endif
@endsection