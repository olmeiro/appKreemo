@extends('layouts.app')

@section('body')


<html>
<head>
    <title>Crud laravel Ajax con datatables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container justify-content-center col-md-8">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Estados de cotización</strong>

                    <a class="btn btn-outline-light float-right" href="javascript:void(0)" id="createNewEstado">Crear estado</a>
            </div>
            <div class="card-body table-responsive">
                @include('flash::message')
                <table class="table data-table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Estado</th>
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

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="estadoForm" name="estadoForm" class="form-horizontal">
                    <input type="hidden" name="estadoCotizacion_id" id="estadoCotizacion_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Estado</label>
                            <label class="validacion col-sm-12 control-label" id="val_Estado"></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="estado_cotizacion" name="estado_cotizacion" placeholder="Digita la Estado" onkeypress="return soloLetras(event)" value="" maxlength="50" required="">
                            </div>
                            <label class="validacion col-sm-12 control-label" id="val_Estado2"></label>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Editar
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
            ajax: "{{ route('ajaxestado.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'estado_cotizacion', name: 'estado_cotizacion'},
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

        $('#createNewEstado').click(function () {
            $('#saveBtn').val("create-product");
            $('#estadoCotizacion_id').val('');
            $('#estadoForm').trigger("reset");
            $('#modelHeading').html("Crear nuevo estado");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editEstadoCotizacion', function () {
            var estadoCotizacion_id = $(this).data('id');
            $.get("{{ route('ajaxestado.index') }}" +'/' + estadoCotizacion_id +'/edit', function (data) {
                $('#modelHeading').html("Editar el estado");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#estadoCotizacion_id').val(data.id);
                $('#estado_cotizacion').val(data.estado_cotizacion);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            let validado = 0;

            if($("#estado_cotizacion").val()==0){
                $("#val_Estado").text("*");
                $("#val_Estado2").text("Debe ingresar la estado");
            }else{
                $("#val_Estado").text("");
                $("#val_Estado2").text("");
                validado++;
            }

            if(validado==1){
            $.ajax({
                data: $('#estadoForm').serialize(),
                url: "{{ route('ajaxestado.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#estadoForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            Swal.fire({
                    title:'Registro exitoso',text:'Estado de Cotizacion !',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
                        });
            }else{
                Swal.fire({
                    title:'Error en la creacion',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
                });
        }

        });

        $('body').on('click', '.deleteEstadoCotizacion', function (e) {
            e.preventDefault();
            var x = confirm("Estas seguro de eliminar el registro !");
            if(x){
            var estadoCotizacion_id = $(this).data("id");
            $.ajax({
                type: "DELETE",
                url: "{{ route('ajaxestado.store') }}"+'/'+estadoCotizacion_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            }else{
                return false;
            }
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
</script>
@endsection
