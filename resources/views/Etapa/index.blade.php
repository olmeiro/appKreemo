@extends('layouts.app')

@section('body')


<html>
<head>
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container justify-content-center col-md-8">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Etapas</strong>

                    <a class="btn btn-outline-light float-right" href="javascript:void(0)" id="createNewEtapa">Crear etapa</a>
            </div>
            <div class="card-body table-responsive">
                @include('flash::message')
                <table class="table data-table table-bordered table-striped" id="tbl_Etapa" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Etapa</th>
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
                    <form id="etapaForm" name="etapaForm" class="form-horizontal">
                    <input type="hidden" name="etapa_id" id="etapa_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Etapa</label>
                            <label class="validacion col-sm-12 control-label" id="val_Etapa"></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="etapa" name="etapa" placeholder="Digita la etapa" onkeypress="return soloLetras(event)" value="" maxlength="50" required="">
                            </div>
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
            ajax: "{{ route('ajaxetapa.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'etapa', name: 'etapa'},
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

        $('#createNewEtapa').click(function () {
            $('#saveBtn').val("create-product");
            $('#etapa_id').val('');
            $('#etapaForm').trigger("reset");
            $('#modelHeading').html("Crear nueva etapa");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editEtapa', function () {
            var etapa_id = $(this).data('id');
            $.get("{{ route('ajaxetapa.index') }}" +'/' + etapa_id +'/edit', function (data) {
                $('#modelHeading').html("Editar la etapa");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#etapa_id').val(data.id);
                $('#etapa').val(data.etapa);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Guardar');
            let validado = 0;

            if($("#etapa").val()==0){
                $("#val_Etapa").text("* Debe ingresar la etapa");
                $("#val_Etapa2").text("Debe ingresar la etapa");
            }else{
                $("#val_Etapa").text("");
                $("#val_Etapa2").text("");
                validado++;
            }

            if(validado==1){
            $.ajax({
                data: $('#etapaForm').serialize(),
                url: "{{ route('ajaxetapa.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#etapaForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            Swal.fire({
                    title:'Registro exitoso',text:'Nueva etapa creada !',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
                        });
            }else{
                Swal.fire({
                    title:'Error en la creación',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
                });
        }

        });
        $('body').on('click', '.deleteEtapa', function (e) {
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
        var etapa_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxetapa.store') }}"+'/'+etapa_id,
            data: {
            "id": etapa_id,
            "_token": token,
            },
            success: function (data) {
                table.draw();
            },

        }).done(function(data){
                if(data && data.ok){
                    Swal.fire({
                    title:'Etapa eliminado.',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    padding:'1rem',
                    backdrop:true,
                    position:'center',
                        });
                    var table = $('#tbl_Etapa').DataTable();
                    table.draw();

                } else {
                    Swal.fire({
                    title:'No se puede borrar',text:'Etapa está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                        padding:'1rem',
                    backdrop:true,
                    position:'center',
                    });
                }
            });
        }
    });
       /*  $('body').on('click', '.deleteEtapa', function (e) {
            e.preventDefault();
            var x = confirm("Estas seguro de eliminar la etapa !");
            if(x){
            var etapa_id = $(this).data("id");
            $.ajax({
                type: "DELETE",
                url: "{{ route('ajaxetapa.store') }}"+'/'+etapa_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            }else{
                return false;
            } */
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
    $("#val_Etapa").text("");
    $("#val_Etapa2").text("");
    }
</script>
@endsection
