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
            <table class="table table-bordered table-striped data-table" >
            <thead align="center">
            <tr id="">
            <th >N°</th>
            <th >Rol</th>
            <th >Nombre</th>
            <th >Email</th>
            <th >Acciones</th>
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
                    <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal"></h4>
                    </div>
            <div class="modal-body">
                <form name="userForm" action="{{ route('users.store') }}" method="POST">
                    <input type="hidden" name="user_id" id="user_id" >
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Contraseña:</strong>
                            <input type="password" name="pw" id="pw" class="form-control" placeholder="contraseña" onchange="validate()" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Rol:</strong>
                                <select class="form-control" name="rol" id="rol" onchange="validate()">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Auxiliar</option>
                                    <option value="3">Supervisor</option>
                                </select>
                            <!-- <input type="text" name="rol" id="rol" class="form-control" placeholder="Rol"onchange="validate()" > -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Crear</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Show user modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true" >
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="userCrudModal-show"></h4>
    </div>
    <div class="modal-body">
    <div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2"></div>
    <div class="col-xs-10 col-sm-10 col-md-10 ">

    <table class="table-responsive ">
    <tr height="50px"><td><strong>Nombre:</strong></td><td id="sname"></td></tr>
    <tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>

    <tr><td></td><td style="text-align: right "><a href="{{ route('users.index') }}" class="btn btn-danger">OK</a> </td></tr>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
{{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
error=false

function validate()
{
if(document.userForm.name.value !='' && document.userForm.email.value !='' && document.userForm.pw.value !='' && document.userForm.rol.value !='' )
document.userForm.btnsave.disabled=false
else
document.userForm.btnsave.disabled=true
}
</script>

<script type="text/javascript">

    $(document).ready(function () {

    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('users.index') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'rol_id', name: 'rol_id'},
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
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
    $('#btn-save').prop('disabled',false);
    $('#crud-modal').modal('show');
    $('#user_id').val(data.id);
    $('#name').val(data.name);
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

    })
    $('#userCrudModal-show').html("Detalles de usuario");
    $('#crud-modal-show').modal('show');
    });

    /* Delete customer */

    $('body').on('click', '#delete-user', function (e) {
        e.preventDefault();

            x =  confirm("Are You sure want to delete ?");

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

                //$('#msg').html('Customer entry deleted successfully');
                //$("#customer_id_" + user_id).remove();
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

    </script>
@endsection
<!DOCTYPE html>
