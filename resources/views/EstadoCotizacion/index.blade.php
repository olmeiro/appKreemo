@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>LISTADO DE ESTADOS</strong>
                <a class="btn btn-link" href="/estadocotizacion/crear">CREAR ESTADO</a>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">CREAR ESTADO </button>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_estadocotizacion" class="table table-bordered table-striped " style="width: 100%;">
                <thead class="" align="center">
                <tr>
                    <th>Estado N°</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Estado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('flash::message')
                <form class="form-signin col-md-12" action="/estadocotizacion/guardar" method="POST" name="FrmCrearEstado" id="FrmCrearEstado">
                @csrf
                    <div class="form-row" >
                        <div class="form-group col-md-12">
                            <label for="">Estado</label>
                            <label class="validacion" id="val_estado_coti"></label>
                            <input type="text" class="form-control @error('Estado_Cotizacion') is-invalid @enderror " id="Estado_Cotizacion" name="Estado_Cotizacion">
                            @error('Estado_Cotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="val_estado_coti2"></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-left">Crear Estado</button>
                    <a href="/estadocotizacion" class="btn btn-outline-primary float-right" >Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>

@include('sweet::alert')
@endsection
@section("scripts")

    <script>
        $('#tbl_estadocotizacion').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/estadocotizacion/listar',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'estado_cotizacion',
                        name: 'estado_cotizacion',
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
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
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/validacionEstadoCotizacion.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
