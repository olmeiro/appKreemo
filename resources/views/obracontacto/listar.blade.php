@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')
<div class="container justify-content-center col-md-8">
@include('flash::message')
    <div class="modal fade" id="exampleModal6" data-backdrop="static"  tabindex="-1" aria-labelledby="exampleModal6" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h4>Contactos de obra</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <div class="card-header">
                        <strong>x</strong>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                    @include('flash::message')
                        <table id="tbl_contactosObras" class="table table-striped table-bordered ">
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
    </div>

    <div class="card">

        <div class="card-header text-white" style="background-color: #616A6B">
                    <strong>Obras</strong>
                    <strong class="float-right"><a type="button" class="btn btn-outline-light float-rigth" href="/obracontacto">Crear Contactos de Obra</a></strong>
                        @if (session('status'))
                        @if(session('status') == '1')
                            <div class="alert alert-success">
                                Se guardo correctamente
                            </div>
                            @else
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                            @endif
                        @endif
        </div>
        <div class="card-body">

                <table id="tbl_obras" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Nombre obra</th>
                            <th>Dirrección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <!-- <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre obra</th>
                                <th>Dirrección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obras as $value)
                                <tr>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->direccion }}</td>
                                    <td>{{ $value->telefono1 }}</td>
                                    <td>{{ $value->correo1 }}</td>
                                    <td>
                                    <a class="btn btn-info" href="/obracontacto/listar?id={{ $value->id }}">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> -->

        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
    <script>
    $('#tbl_obras').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/obracontacto/listar',
                columns: [
                    {
                     data: 'nombre',
                     name: 'nombre',
                    },
                    {
                     data: 'direccion',
                     name: 'direccion',
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
                        data: 'ver',
                        name: 'ver',
                        orderable: false,
                        searchable: false,
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

            

            $('body').on('click', '#ver-Contactos', function () {
                // var cliente_id = $(this).data('id');
                // $.get('/obracontacto/ver/'+cliente_id, function (res) {

                //     var arreglo = JSON.parse(res);
               
                //     for(var x= 0; x<arreglo.length;x++){
                //         var todo = '<tr><td>'+arreglo[x].obra+'</td>';
                //         todo+='<td>'+arreglo[x].nombre+'</td>';
                //         todo+='<td>'+arreglo[x].apellido1+'</td>';
                //         todo+='<td>'+arreglo[x].telefono1+'</td>';
                //         todo+='<td>'+arreglo[x].correo1+'</td></tr>';
                //         $('#tbody').append(todo);
                        
                //     }

               
            //});

            var id = $(this).data('id');
            var url = '/obracontacto/ver/'+id;
            console.log(url);

            $('#tbl_contactosObras').DataTable({
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


            $('body').on('click', '#editar-Contactos', function () {
                var obra_id = $(this).data('id');
                $.get('/obracontacto/editar/'+obra_id, function (data) {

                $('#clienteCrudModal').html("Editar contacto");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#exampleModal4').modal('show');
                $('#cliente_id').val(data.id);
                $('#cidtipocontacto').val(data.idtipocontacto);
                $('#cnombre').val(data.nombre);
                $('#capellido1').val(data.apellido1);
                $('#capellido2').val(data.apellido2);
                $('#cdocumento').val(data.documento);
                $('#cestado').val(data.estado);
                $('#ctelefono1').val(data.telefono1);
                $('#ctelefono2').val(data.telefono2);
                $('#ccorreo1').val(data.correo1);
                $('#ccorreo2').val(data.correo2);

            })
            });

            function agregar_contacto(){

let contacto_id = $("#contactos option:selected").val();
let contacto_text = $("#contactos option:selected").text();


$("#tblContactos").append(`

    <tr id="tr-${contacto_id}">
        <td>
            <input type="hidden" name="contacto_id[]" value="${contacto_id}" />
            ${contacto_text}
        </td>
        <td>
            <button type="button" class="btn btn-danger" onclick="eliminar_contacto(${contacto_id})">X</button>
        </td>
    </tr>
`);
}

function eliminar_contacto(id){
$("#tr-"+id).remove();
}

function dartipo()
{
id = document.getElementById("contactos").selectedIndex;
console.log("id es_"+id);

tipo = document.getElementById("tipoContacto").selectedIndex = id;
console.log("tipo es_"+tipo);

}

            $('body').on('click', '#delete-obra', function (e) {
            e.preventDefault();

            x = confirm("Esta seguro de eliminar !");

            if (x){
                var obra_id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "POST", 
                    url: "/obra/eliminar/"+obra_id,
                    data: {
                    "id": obra_id,
                    "_token": token,
                    },
                })
                    .done(function(respuesta){
                        if(respuesta && respuesta.ok){
                            Swal.fire({
                            title:'Obra eliminada',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                            backdrop:true,
                            position:'center',
                                });
                                var table = $('#tbl_obras').DataTable();    
                                table.ajax.reload();
                        } else {
                            

                        Swal.fire({
                            title:'Para eliminar esta obra, primero debes eliminar sus contactos y cotizaciones.',text:'La Obra está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                            backdrop:true,
                            position:'center',
                        });
                        var table = $('#tbl_obras').DataTable();    
                            table.ajax.reload();
                        }
                    
                    })
            
            }
            else
            {
            return false;
            }
            });

            $('body').on('click', '#delete-obracontacto', function (e) {
            e.preventDefault();

            x = confirm("Esta seguro de eliminar !");

            if (x){
                var obraContacto_id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "POST", 
                    url: "/obracontacto/eliminar/"+obraContacto_id,
                    data: {
                    "id": obraContacto_id,
                    "_token": token,
                    },
                })
                    .done(function(respuesta){
                        if(respuesta && respuesta.ok){
                            Swal.fire({
                            title:'Contacto de obra eliminado',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                            backdrop:true,
                            position:'center',
                                });
                                var table = $('#tbl_contactosObras').DataTable();    
                                table.ajax.reload();
                        } else {
                            

                        Swal.fire({
                            title:'No se puede borrar',text:'',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                            backdrop:true,
                            position:'center',
                        });
                        var table = $('#tbl_contactosObras').DataTable();    
                            table.ajax.reload();
                        }
                    
                    })
            
            }
            else
            {
            return false;
            }
            });


            

            </script>
             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
@endsection


<!-- <button type="button" class="btn btn-info-light float-right" data-toggle="modal" data-target="#exampleModal3"><a class="btn btn-info" href="/obracontacto/listar?id={{ $value->id }}">Ver</a> </button> -->
