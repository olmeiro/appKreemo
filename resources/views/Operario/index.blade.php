@extends('layouts.app')

@section('body')
<html>
<head>
    <title>Operario</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}
</head>
<body oncopy="return false" onpaste="return false">

<div class="container">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Operarios</strong>
                <button type="button" class="btn btn-outline-light float-right" href="javascript:void(0)" id="createNewOperario">Crear operario</button>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered data-table table-striped border" id="tbl_operario">
                    <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Celular</th>
                        <th width="20%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="modelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="operarioForm" name="operarioForm" class="form-horizontal">
                   <input type="hidden" name="operario_id" id="operario_id">
                <div class="row">
                    <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <label class="validacion" id="validacion_nombre"></label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"  value="" maxlength="20" required="" onkeypress="return soloLetras(event)" placeholder="Digite aquí el nombre">
                                @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="validacion" id="validacion_nombre2"></label>
                    </div>
                    <div class="form-group col-sm-6">
                            <label for="apellido">Apellido</label>
                            <label class="validacion" id="validacion_apellido"></label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido"  value="" maxlength="20" required="" onkeypress="return soloLetras(event)" placeholder="Digite aquí el apellido">
                            @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_apellido2"></label>
                     </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                            <label for="documento">Documento</label>
                            <label class="validacion" id="validacion_documento"></label>
                            <input type="text" class="form-control @error('documento') is-invalid @enderror" id="documento" name="documento" value="" maxlength="12" required="" onkeypress="return soloNumeros(event)" placeholder="Digite aquí el documento">
                            @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" id="validacion_documento2"></label>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="celular">Celular</label>
                         <label class="validacion" id="validacion_celular"></label>
                        <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular"value="" maxlength="13" required="" onkeypress="return soloNumeros(event)" placeholder="Digite aquí el celular">
                        @error('celular')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="validacion_celular2"></label>
                       </div>
                </div>

                <div  align="center">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button>

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
        ajax: "{{ route('ajaxoperario.index') }}",
        columns: [
            {data: 'nombre', name: 'nombre'},
            {data: 'apellido', name: 'apellido'},
            {data: 'documento', name: 'documento'},
            {data: 'celular', name: 'celular'},
            {data: 'acciones', name: 'acciones', orderable: false, searchable: false},
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

    $('#createNewOperario').click(function () {
        $('#saveBtn').val("create-operario");
        $('#operario_id').val('');
        $('#operarioForm').trigger("reset");
        $('#modelHeading').html("Crear operario");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editOperario', function () {
      var operario_id = $(this).data('id');
      $.get("{{ route('ajaxoperario.index') }}" +'/' + operario_id +'/edit', function (data) {
          $('#modelHeading').html("Editar operario");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#operario_id').val(data.id);
          $('#nombre').val(data.nombre);
          $('#apellido').val(data.apellido);
          $('#documento').val(data.documento);
          $('#celular').val(data.celular)
      })
   });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Creando..');
        let validado = 0;

        if($("#nombre").val()==0){
            $("#validacion_nombre").text("*");
            $("#validacion_nombre2").text("Debe Ingresar el Nombre");
        }else{
            $("#validacion_nombre").text("");
            $("#validacion_nombre2").text("");
            validado++;
        }

        if($("#apellido").val()==0){
            $("#validacion_apellido").text("*");
            $("#validacion_apellido2").text("Debe Ingresar el Apellido");
        }else{
            $("#validacion_apellido").text("");
            $("#validacion_apellido2").text("");
            validado++;
        }

        if($("#documento").val()==0){
            $("#validacion_documento").text("*");
            $("#validacion_documento2").text("Debe Ingresar el Documento");
        }else if($("#documento").val().length < 7 || $("#documento").val().length > 12){
            $("#validacion_documento").text("*");
            $("#validacion_documento2").text("Debe digitar entre 7 y 12 números");
        }else{
            $("#validacion_documento").text("");
            $("#validacion_documento2").text("");
            validado++;
        }

        if($("#celular").val()==0){
            $("#validacion_celular").text("*");
            $("#validacion_celular2").text("Debe Ingresar el Celular");
        }else if($("#celular").val().length < 7 || $("#celular").val().length > 13){
            $("#validacion_celular").text("*");
            $("#validacion_celular2").text("Debe digitar entre 7 y 13 números");
        }else{
            $("#validacion_celular").text("");
            $("#validacion_celular2").text("");
            validado++;
        }

        if(validado==4){
            $.ajax({
            data: $('#operarioForm').serialize(),
            url: "{{ route('ajaxoperario.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#operarioForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Crear');
            }
      });
            Swal.fire({
                title:'Registro exitoso',text:'Operario creado!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                //width: '50%',
                padding:'1rem',
                //background:'#000',
                backdrop:true,
                //toast: true,
                position:'center',
                    });
                    $("#validacion_nombre").text("");
                    $("#validacion_nombre2").text("");
                    $("#validacion_apellido").text("");
                    $("#validacion_apellido2").text("");
                    $("#validacion_documento").text("");
                    $("#validacion_documento2").text("");
                    $("#validacion_celular").text("");
                    $("#validacion_celular2").text("");
                    $("input").val("");
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

    $('body').on('click', '#deleteOperario', function (e) {
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
        var operario_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxoperario.store') }}"+'/'+operario_id,
            data: {
            "id": operario_id,
            "_token": token,
            },
            success: function (data) {
                table.draw();
            },

        }).done(function(data){
                if(data && data.ok){
                    Swal.fire({
                    title:'Operario eliminado.',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    padding:'1rem',
                    backdrop:true,
                    position:'center',
                        });
                    var table = $('#tbl_operario').DataTable();
                    table.draw();

                } else {
                    Swal.fire({
                    title:'No se puede borrar',text:'Operario está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
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
<script src="{{ asset('js/validacionOperario.js') }}"></script>
</html>
@endsection
@section('style')
    <link href="{{ asset('css/styleMaquiOperario.css') }}" rel="stylesheet">
@endsection
