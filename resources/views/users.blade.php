@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Usuarios</strong>
            <button type="button" class="btn btn-outline-light float-right" id="new-user" data-toggle="modal">Crear usuario</button>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped data-table" style="width: 100%;">
                <thead>
                <tr id="">
                    <th >N°</th>
                    <th >Rol</th>
                    <th >Nombre</th>
                    <th >Apellido</th>
                    <th >Email</th>
                    <th >Estado</th>
                    <th width="30%" >Acciones</th>
                    <th >Cambiar estado</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
                    <div class="modal-header text-white"  style="background-color: #616A6B">
                    <h4 class="modal-title" id="userCrudModal"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>
            <div class="modal-body">
                <form name="user" id="user" >
                    <input type="hidden" name="user_id" id="user_id" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="name" id="name" class="form-control" onkeypress="return soloLetras(event)">
                                <label class="validacion" id="valname"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Apellido:</strong>
                                <input type="text" name="lastname" id="lastname" class="form-control" onkeypress="return soloLetras(event)">
                                <label class="validacion" id="vallast"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" id="email" class="form-control">
                                <label class="validacion" id="valemail"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <strong>Contraseña:</strong>
                            <input type="password" name="pw" id="pw" class="form-control">
                            <label class="validacion" id="valpw"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div >
                                <strong>Rol:</strong>
                                <select class="form-control" name="rol" id="rol">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Auxiliar</option>
                                    <option value="3">Supervisor</option>
                                </select>
                                <label class="validacion" id="valrol"></label>
                            <!-- <input type="text" name="rol" id="rol" class="form-control" placeholder="Rol"onchange="validate()" > -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-success" >Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Show user modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true" >
        <div class="modal-dialog ">
            <div class="modal-content"  >
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h4 class="modal-title" id="userCrudModal-show"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10 ">
                        <table class="table-responsive ">
                            <tr height="50px"><td><strong>Nombre:</strong></td><td id="sname"></td></tr>
                            <tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>
                            <tr height="50px"><td><strong>Rol:</strong></td><td id="srol"></td></tr>

                            <tr>
                                <td></td><td style="text-align: right "><a href="" class="btn btn-danger" data-dismiss="modal">OK</a> </td></tr>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('style')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script>

   $(function () {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('users.index') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'rolname', name: 'rolname'},
    {data: 'name', name: 'name'},
    {data: 'lastname', name: 'lastname'},
    {data: 'email', name: 'email'},
    {data: 'estado', name: 'estado'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    {data: 'cambiar', name: 'cambiar'},


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

    /* When click New customer button */
    $('#new-user').click(function () {
    $('#btn-save').val("create-user");
    $('#user').trigger("reset");
    $('#userCrudModal').html("Crear usuario");
    $('#crud-modal').modal('show');
    });

    /* Edit customer */
    $('body').on('click', '#edit-user', function () {
    var user_id = $(this).data('id');
    $.get('users/'+user_id+'/edit', function (data) {
    $('#userCrudModal').html("Editar usuario");
    $('#btn-update').val("Update");
    $('#btn-save').val("edit-user");
    $('#crud-modal').modal('show');
    $('#user_id').val(data.id);
    $('#name').val(data.name);
    $('#lastname').val(data.lastname);
    $('#email').val(data.email);
    $('#pw').val(data.password);
    $('#rol').val(data.rol_id);

    })
    });

    /* Show customer */
    $('body').on('click', '#show-user', function () {
    var user_id = $(this).data('id');
    $.get('users/'+user_id, function (data) {
    $('#sname').html(data.name);
    $('#semail').html(data.email);
    $('#srol').html(data.rolname);

    })
    $('#userCrudModal-show').html("Detalles de usuario");
    $('#crud-modal-show').modal('show');
    });

    $('#btn-save').click(function (e) {
        e.preventDefault();
        let validado = 0;

        if($("#name").val().length == 0)
         {
             $("#valname").text("* Debe ingresar el nombre");
         }
         else
         {
             $("#valname").text("");
             validado++;
         }

         if($("#lastname").val().length == 0)
         {
             $("#vallast").text("* Debe ingresar el apellido");
         }
         else
         {
             $("#vallast").text("");
             validado++;
         }

         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);

         if($("#email").val().length == 0 || !emailRegex.test($("#email").val()))
         {
             $("#valemail").text("* Ingrese un correo válido.");
         }
         else
         {
             $("#valemail").text("");
             validado++;
         }

         if( $("#pw").val() == 0 )
         {
             $("#valpw").text("* Debe introducir la contraseña");
         }
         else
         {
             $("#valpw").text("");
             validado++;
         }

         if( $("#rol").val() == 0 )
         {
             $("#valrol").text("* Debe elegir un rol");
         }
         else
         {
             $("#valrol").text("");
             validado++;
         }

         console.log("validado: " + validado);

         if (validado==5){
         $.ajax({
            data: $('#user').serialize(),
            url: "{{ route('users.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#user').trigger("reset");
                $('#crud-modal').modal('hide');
                table.draw();

            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('Crear');
            }
        });
            Swal.fire({
                title:'Proceso exitoso',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });

        } else{
            Swal.fire({
                title:'Error en el proceso',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
            });
        }

    });



    /* Delete customer */

    $('body').on('click', '#delete-user', function (e) {
        e.preventDefault();

            x =  confirm("Está seguro que quiere eliminar ?");

            if (x){
                var user_id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                type: "DELETE",
                url: "/users/"+user_id,
                data: {
                "id": user_id,
                "_token": token,
                },
                success: function (data) {

                table.ajax.reload();
                },
                error: function (data) {
                console.log('Error:', data);
                }
                });
            }
            else
            {
            return false;
            }
        });

    });

    function limpiar(){
        $("input").val("");
        $("select").val("0");
        $("label").text("");
    }

    function soloLetras(e) {
    var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

    for (var i in especiales) {
    if (key == especiales[i]) {
        tecla_especial = true;
        break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;}
    }
</script>
@endsection
<!DOCTYPE html>
