@extends('layouts.app')

@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section('body')

<!-- Modal crear obra -->

<div class="modal fade" data-backdrop="static" id="obraModal2" tabindex="-1" role="dialog" aria-labelledby="obraLabelModal2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h5 class="modal-title" id="obraLabelModal2">Crear obra</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    @include('flash::message')
                    <form action="/obra/guardar" id="frmCreateObra" name="frmCreateObra" method="POST">
                    @csrf
                        <div class="row">
                                <div class="col-6">
                                <label for="">Nombre empresa</label>
                                    <select class="form-control @error('idempresa') is-invalid @enderror" name="idempresa" id="idempresa">
                                        <option value="0">Seleccione</option>
                                        @foreach($empresa as $key =>$value)
                                            <option value="{{ $value->id }}">{{ $value->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <label class="validacion" for="idempresa" id="valIdEmpresa"></label>
                                </div>
                                <div class="col 6">
                                    <label for="">Nombre obra</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre"value="{{old('nombre')}}">
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" for="valNombre" id="valNombre"></label>
                                </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion" value="{{old('direccion')}}">
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" for="valDireccion" id="valDireccion"></label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Telefono</label>
                                    <input type="text" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1" value="{{old('telefono1')}}">
                                    @error('telefono1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" for="valTelefono1" id="valTelefono1"></label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="email" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1" value="{{old('correo1')}}">
                                    @error('correo1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" for="valCorreo1" id="valCorreo1"></label>
                                </div>
                            </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" id="crearObra" name="crearObra" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ver contactos modal -->

    <div class="modal fade" data-backdrop="static" id="verModal4" tabindex="-1" role="dialog" aria-labelledby="obraLabelModal2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h5 class="modal-title" id="obraLabelModal2">Crear obra</h5> <button type="button" class="close" data-dismiss="modal"  aria-label="Close" > <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                @include('flash::message')
                        <table id="tbl_contactos" class="table table-striped table-bordered ">
                        <!-- <table class="table table-bordered" style="width: 100%;">     -->
                            <thead>
                            <tr>
                                <th>Obra</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Editar obra -->

    

    <!-- lista obras -->

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
                paging: false,
                searching: false,
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

            // ver-Contactos data table

            $('body').on('click', '#ver-Contactos', function () {

                var id = $(this).data('id');
                var url = '/obra/ver/'+id;
                console.log(url);
   
                $('#tbl_contactos').DataTable({
                destroy: true,
                paging: false,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    {
                     data: 'obra',
                     name: 'obra',
                    },
                    {
                     data: 'nombre',
                     name: 'nombre',
                    },
                    {
                     data: 'apellido1',
                     name: 'apellido1',
                    },
                    {
                     data: 'telefono1',
                     name: 'telefono1',
                    },
                    {
                        data: 'correo1',
                        name: 'correo1'
                    },
                    {
                        data: 'eliminar',
                        name: 'eliminar',
                        orderable: false,
                        searchable: false,
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
   
               });

          

           



    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionObra.js') }}"></script>
@endsection


