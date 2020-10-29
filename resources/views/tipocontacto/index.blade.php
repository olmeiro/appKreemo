@extends('layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white float-right" style="background-color: #616A6B" >
            <strong>Tipo contactos</strong>
            <a href="/tipocontacto/crear" class="btn btn-outline-light float-right">Crear tipo contacto</a>
            <a href="/cliente" class="btn btn-outline-light float-right">Volver a contactos</a>
        </div>
        <div class="card-body table-responsive">
        @include('flash::message')
            <table id="tbl_tipocontacto" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo contacto</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("scripts")
    <script>
        $('#tbl_tipocontacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/tipocontacto/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id'
                    },
                    {
                     data: 'tipocontacto',
                     name: 'tipocontacto'
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'eliminar',
                        name: 'eliminar',
                        orderable: false,
                        searchable: false
                    }
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

            $('body').on('click', '#eliminar-tipoContacto1', function (e) {
                e.preventDefault();
                
                Swal.fire({
                    title: '¿Está seguro que desea eliminar?',
                    text: "No podrá recuperar los datos!",
                    type: 'warning',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar',
                }).then((choice) => {
                    if (choice.value === true) {
                    var tipo_id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        type: "POST", 
                        url: "/tipocontacto/eliminar/"+tipo_id,
                        data: {
                        "id": tipo_id,
                        "_token": token,
                        },
                    }).done(function(respuesta){
                            if(respuesta && respuesta.ok){
                                Swal.fire({
                                    title:'Tipo contacto eliminado.',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                                    padding:'1rem',
                                    backdrop:true,
                                    position:'center',
                                        });
                                    var table = $('#tbl_tipocontacto').DataTable();    
                                    table.ajax.reload();
                            } else {
                                Swal.fire({
                                title:'No se puede borrar',text:'Tipo contacto está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                                    padding:'1rem',
                                backdrop:true,
                                position:'center',
                                });
                            }
                        });
                    }
                    });

                });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
@endsection

