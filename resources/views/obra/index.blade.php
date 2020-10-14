@extends('layouts.app')

@section('body')

<div class="modal fade" data-backdrop="static" id="obraModal2" tabindex="-1" role="dialog" aria-labelledby="obraLabelModal2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h5 class="modal-title" id="obraLabelModal2">Crear obra</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    @include('flash::message')
                    <form action="/obra/guardar" method="POST">
                    @csrf
                        <div class="row">
                  
                                <div class="col-6">
                                <label for="">Nombre empresa</label>
                                    <select class="form-control @error('idtipocontacto') is-invalid @enderror" name="idtipocontacto" id="idtipocontacto">
                                        <option value="0">Seleccione</option>
                                        @foreach($empresa as $key =>$value)
                                            <option value="{{ $value->id }}">{{ $value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 
                                
                                <div class="col 6">
                                    <label for="">Nombre obra</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre"value="{{old('nombre')}}">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                               
                                  
                    

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion" value="{{old('direccion')}}">
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Telefono</label>
                                    <input type="text" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1" value="{{old('telefono1')}}">
                                    @error('telefono1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="email" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1" value="{{old('correo1')}}">
                                    @error('correo1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                            <div class="col-md-6">
                                <button type="button" id="crearObra" class="btn btn-success float-left">Crear</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Obras</strong>
            <strong class="float-right"><button type="button" class="btn btn-outline-light float-rigth" data-toggle="modal" data-target="#obraModal2">Crear obra</button></strong>

            <!-- <a href="/obra/crear" class="btn btn-outline-light">CREAR OBRA</a>  -->
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_obra" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Nombre obra</th>
                    <th>Dirección</th>
                    <th>Telefono 1</th>
                    <th>Correo 1</th>
                    <th>ver</th>
                    <th>Agregar</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section("scripts")

    <script>
        $('#tbl_obra').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/obra/listar',
                columns: [
                    {
                     data: 'empresa',
                     name: 'empresa',
                    },
                    {
                     data: 'nombre',
                     name: 'nombre',
                    },
                    {
                        data: 'direccion',
                        name: 'direccion'
                    },
                    {
                        data: 'telefono1',
                        name: 'telefono1'
                    },
                    {
                        data: 'correo1',
                        name: 'correo1'
                    },
                    {
                        data: 'ver',
                        name: 'ver',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'agregar',
                        name: 'agregar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                            }
            });

    </script>
@endsection
