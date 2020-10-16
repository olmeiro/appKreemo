@extends('layouts.app')

@section('body')
<html>
<head>
    <title>Maquinaria</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}
</head>
<body oncopy="return false" onpaste="return false">

<div class="container">
        <div class="card">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Maquinaria</strong>
                <button type="button" class="btn btn-outline-light float-right" href="javascript:void(0)" id="createNewMaquina">Crear máquina</button>
            </div>

            <!-- <a class="btn btn-success" href="javascript:void(0)" id="createNewMaquina">CREAR MAQUINA</a> -->
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped  data-table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Estado</th>
                            <th>Serial equipo</th>
                            <th>Modelo</th>
                            <th>Serial motor</th>
                            <th>Observación</th>
                            <th>Acciones</th>
                            <th>Cambiar estado a:</th>
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
                <form id="maquinariaForm" name="maquinariaForm" class="form-horizontal">
                   <input type="hidden" name="maquinaria_id" id="maquinaria_id">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="serialequipo">Serial equipo</label><img src="img/info.png" class="img-fluid" width="20px" data-toggle="tooltip" data-placement="top" title="Campo númerico">
                        <label class="validacion" id="validacion_serialequipo"></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('serialequipo') is-invalid @enderror" id="serialequipo" name="serialequipo" value="" maxlength="50" required="" onkeypress="return soloNumeros(event)">
                            @error('serialequipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <label class="validacion" id="validacion_serialequipo2"></label>
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modelo" >Modelo</label>
                            <label class="validacion" id="validacion_modelo"></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="" maxlength="50" required="" onkeypress="return soloLetrasynumeros(event)">
                                @error('modelo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="validacion" id="validacion_modelo2"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="serialmotor">Serial motor</label>
                            <label class="validacion" id="validacion_serialmotor"></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('serialmotor') is-invalid @enderror" id="serialmotor" name="serialmotor" value="" maxlength="50" required="" onkeypress="return soloLetrasynumeros(event)">
                                @error('serialmotor')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="validacion" id="validacion_serialmotor2"></label>
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Observaciones</label><img src="img/info.png" class="img-fluid" width="20px" data-toggle="tooltip" data-placement="top" title="Ingrese información adicional">
                        <label class="validacion" id="validacion_observacion"></label>
                        <div class="col-sm-12">
                            <textarea id="observacion" name="observacion" required="" class="form-control @error('observacion') is-invalid @enderror" onkeypress="return soloLetras(event)"></textarea>
                            @error('observacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <label class="validacion" id="validacion_observacion2"></label>
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


</html>
@section('scripts')
<script src="{{ asset('js/validacionMaquinaria.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/tooltips.js') }}"></script>
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
        ajax: "{{ route('ajaxmaquinaria.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'estado', name: 'estado'},
            {data: 'serialequipo', name: 'serialequipo'},
            {data: 'modelo', name: 'modelo'},
            {data: 'serialmotor', name: 'serialmotor'},
            {data: 'observacion', name: 'observacion'},
            {data: 'acciones', name: 'acciones', orderable: false, searchable: false},
            {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}

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

    $('#createNewMaquina').click(function () {
        $('#saveBtn').val("create-maquina");
        $('#maquinaria_id').val('');
        $('#maquinariaForm').trigger("reset");
        $('#modelHeading').html("Crear máquina");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editMaquinaria', function () {
      var maquinaria_id = $(this).data('id');
      $.get("{{ route('ajaxmaquinaria.index') }}" +'/' + maquinaria_id +'/edit', function (data) {
          $('#modelHeading').html("Editar máquina");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#maquinaria_id').val(data.id);
          $('#estado').val(data.estado);
          $('#serialequipo').val(data.serialequipo);
          $('#modelo').val(data.modelo);
          $('#serialmotor').val(data.serialmotor);
          $('#observacion').val(data.observacion);
      })
   });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Creando..');
        let validado = 0;

      if($("#serialequipo").val()==0){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe Ingresar el serial del equipo");
        }else if($("#serialequipo").val().length < 7 || $("#serialequipo").val().length >= 20){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe estar entre 7 y 20 dígitos");
        }else{
            $("#validacion_serialequipo").text("");
            $("#validacion_serialequipo2").text("");
            validado++;
        }

        if ($("#modelo").val()==0) {
            $("#validacion_modelo").text("*");
            $("#validacion_modelo2").text("Debe Ingresar el modelo");
        }else{
            $("#validacion_modelo").text("");
            $("#validacion_modelo2").text("");
            validado++;
        }

        if ($("#serialmotor").val()==0) {
            $("#validacion_serialmotor").text("*");
            $("#validacion_serialmotor2").text("Debe Ingresar el serial del motor");
        }else{
            $("#validacion_serialmotor").text("");
            $("#validacion_serialmotor2").text("");
            validado++;
        }

        if(validado==3){
            $.ajax({
            data: $('#maquinariaForm').serialize(),
            url: "{{ route('ajaxmaquinaria.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#maquinariaForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Crear');
            }
      });
             Swal.fire({
                title:'Registro exitoso',text:'Maquina creada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });
                    $("#validacion_serialequipo").text("");
                    $("#validacion_serialequipo2").text("");
                    $("#validacion_modelo").text("");
                    $("#validacion_modelo2").text("");
                    $("#validacion_serialmotor").text("");
                    $("#validacion_serialmotor2").text("");
                    $("#validacion_observacion").text("");
                    $("#validacion_observacion2").text("");
                    $("input").val("");
                    $("textarea").val("");
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

    $('body').on('click', '.deleteMaquinaria', function (e) {
        e.preventDefault();
        var x = confirm("Está seguro que quiere eliminar ?");
        if(x){
        var maquinaria_id = $(this).data("id");
        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxmaquinaria.store') }}"+'/'+maquinaria_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                Swal.fire({
                title:'Error al eliminar',text:'esta maquina está ocupada',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
            });
            }
        });
        }else{
      return false;
    }
    });

  });
</script>

@endsection
@endsection
@section('style')
    <link href="{{ asset('css/styleMaquiOperario.css') }}" rel="stylesheet">
@endsection
