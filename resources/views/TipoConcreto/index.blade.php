@extends('layouts.app')
@section('body')
<html>
<head>
    <title>Crud laravel Ajax con datatables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container justify-content-cente col-md-8">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Tipos de concretos</strong>
                    <a class="btn btn-outline-light float-right" href="javascript:void(0)" id="createNewTipoConcreto">Crear tipo de concreto</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table data-table table-bordered table-striped" id="tbl_TipoConcreto" style="width: 100%;">
                    <thead class="table-secondary">
                        <tr>
                            <th>N°</th>
                            <th>Tipo de concreto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card-footer" >
                <a href="/cotizacion" class="btn btn-outline-light float-right" style="background-color: #616A6B" >Volver</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tipoConcretoForm" name="tipoConcretoForm" class="form-horizontal">
                    <input type="hidden" name="tipoConcreto_id" id="tipoConcreto_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Tipo de concreto</label>
                            <label class="validacion col-sm-12 control-label" id="val_TipoC"></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tipo_concreto" name="tipo_concreto" placeholder="Digita el tipo de concreto" onkeypress="return soloLetras(event)" value="" maxlength="50" required="">
                            </div>
                            {{-- <label class="validacion col-sm-12 control-label" id="val_TipoC2"></label> --}}
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ajaxtipoConcreto.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tipo_concreto', name: 'tipo_concreto'},
                {data: 'acciones', name: 'acciones', orderable: false, searchable: false},
            ],
            "language":{
                                "sProcessing":     "Procesando...",
                                "sLengthMenu":     "Mostrar _MENU_ registros",
                                "sZeroRecords":    "No se encontraron resultados",
                                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                "sInfo":           "Registros del _START_ al _END_ de _TOTAL_ .",
                                "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
                                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                "sInfoPostFix":    "",
                                "sSearch":         "Buscar:",
                                "sUrl":            "",
                                "sInfoThousands":  ",",
                                "sLoadingRecords": "Cargando...",
                                "oPaginate": {
                                    "sFirst":    "Primero",
                                    "sLast":     "Último",
                                    "sNext":     ">>",
                                    "sPrevious": "<<"
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
        $('#createNewTipoConcreto').click(function () {
            $('#saveBtn').val("create-product");
            $('#tipoConcreto_id').val('');
            $('#tipoConcretoForm').trigger("reset");
            $('#modelHeading').html("Crear nuevo tipo de concreto");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editTipoConcreto', function () {
            var tipoConcreto_id = $(this).data('id');
            $.get('/ajaxtipoConcreto/' + tipoConcreto_id +'/edit', function (data) {
                $('#modelHeading').html("Editar tipo de concreto");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#tipoConcreto_id').val(data.id);
                $('#tipo_concreto').val(data.tipo_concreto);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Guardar');
            let validado = 0;

            if($("#tipo_concreto").val()==0){
                $("#val_TipoC").text("* Debe ingresar el tipo de concreto");
                $("#val_TipoC2").text("Debe ingresar el tipo de concreto");
            }else{
                $("#val_TipoC").text("");
                $("#val_TipoC2").text("");
                validado++;
            }

            if(validado==1){
            $.ajax({
                data: $('#tipoConcretoForm').serialize(),
                url: "{{ route('ajaxtipoConcreto.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#tipoConcretoForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            Swal.fire({
                    title:'Registro exitoso',text:'Tipo de Concreto !',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    padding:'1rem',
                    backdrop:true,
                    position:'center',
                        });
            }else{
                Swal.fire({
                    title:'Error en la creación',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                    padding:'1rem',
                    backdrop:true,
                    position:'center',
                });
        }
        });
        $('body').on('click', '.deleteTipoConcreto', function (e) {
        e.preventDefault();

        Swal.fire({
        title: '¿Está seguro que desea eliminar?',
        type: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar',
    }).then((choice) => {
        if (choice.value === true) {
            var tipoConcreto_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "DELETE",
                url: "{{ route('ajaxtipoConcreto.store') }}"+'/'+tipoConcreto_id,
                data: {
                "id": tipoConcreto_id,
                "_token": token,
                },
                success: function (data) {
                    table.draw();
                },
            }).done(function(data){
                    if(data && data.ok){
                        Swal.fire({
                        title:'Tipo de concreto eliminado.',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                        padding:'1rem',
                        backdrop:true,
                        position:'center',
                            });
                        var table = $('#tbl_TipoConcreto').DataTable();
                        table.draw();

                    } else {
                        Swal.fire({
                        title:'No se puede borrar',text:'Tipo de concreto está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                        backdrop:true,
                        position:'center',
                        });
                    }
                });
            }
        });
    });
    });
</script>
</html>
@endsection
@section('style')
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection
@section("scripts")
<script>
    function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
    function limpiar(){
    $("#val_TipoC").text("");
    $("#val_TipoC2").text("");
    }
</script>
@endsection
