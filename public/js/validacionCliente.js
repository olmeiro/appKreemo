//Validacion Crear Contacto::
  $(document).ready(function() {
    $("#crearContacto").click(function(event){
         event.preventDefault();

         let validado = 0;

         if( $("#idtipocontacto").val() == 0 )
         {
             $("#valContacto").text("* Debe elegir un tipo de contacto");
         }
         else
         {
             $("#valContacto").text("");
             validado++;
         }

         if(validaVacio($("#nombre").val()) || $("#nombre").val().length == 0 || $("#nombre").val().length > 30)
         {
             $("#valNombre").text("* Debe ingresar el nombre del contacto");
         }
         else
         {
             $("#valNombre").text("");
             validado++;
         }
 
         if(validaVacio($("#apellido1").val()) || $("#apellido1").val().length == 0 || $("#apellido1").val().length > 30)
         {
             $("#valApellido1").text("* Ingresar primer apellido del contacto");
         }
         else
         {
             $("#valApellido1").text("");
             validado++;
         }
 
         if(validaVacio($("#apellido2").val()) || $("#apellido2").val().length == 0 || $("#apellido2").val().length > 30)
         {
             $("#valApellido2").text("* Debe ingresar el segundo apellido del contacto.")
         }
         else{
             $("#valApellido2").text("");
             validado++;
         }
 
         var documento = document.getElementById("documento");
         if(documento.value == "" || documento.value == null || $("#documento").val().length > 10 || $("#documento").val().length < 7)
         {
             $("#valDocumento").text("* Debe ingresar el número válido documento del contacto.");
         }
         else
         {
             $("#valDocumento").text("");
             validado++;
         }

         if($("#telefono1").val().length == 0 || isNaN($("#telefono1").val()))
         {
             $("#valTelefono1").text("* Ingrese un número de telefono valido");
         }
         else if(!(/^\d{7,10}$/.test($("#telefono1").val())))
         {
          $("#valTelefono1").text("* Ingrese un número de celular de 10 dígitos.");
         }
         else{
             $("#valTelefono1").text("");
             validado++;
         }

         if($("#telefono2").val().length == 0 || isNaN($("#telefono2").val()))
         {
             $("#valTelefono2").text("* Ingrese un número de telefono valido");
         }
         else if(!(/^\d{7,10}$/.test($("#telefono2").val())))
         {
          $("#valTelefono2").text("* Ingrese un número de celular de 10 dígitos.");
         }
         else{
             $("#valTelefono2").text("");
             validado++;
         }
 
         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);
 
         if($("#correo1").val().length == 0 || !emailRegex.test($("#correo1").val()))
         {
             $("#valCorreo1").text("* Ingrese un correo valido.");
         }
         else
         {
             $("#valCorreo1").text("");
             validado++;
         }
 
         if($("#correo2").val().length == 0 || !emailRegex.test($("#correo2").val()))
         {
             $("#valCorreo2").text("* Ingrese un correo valido.");
         }
         else
         {
             $("#valCorreo2").text("");
             validado++;
         }
 
         console.log("validado: " + validado);
 
         if(validado == 9)
         {
            var fd = new FormData(document.getElementById("frmContacto"));

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/cliente/guardarNuevo",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                }).done(function(respuesta){
                  if(respuesta.ok)
                  {
                    Swal.fire('Se registro el nuevo tipo contacto.');
                     $("#exampleModal2").modal('hide');//ocultamos el modal
                     $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                     $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                     $("#mensaje").text("Nueno contacto Creado")
                    var table = $('#tbl_contacto').DataTable();
                    table.ajax.reload();
                    
                    limpiar();
                  }
                  else{
                    Swal.fire('No se puedo crear el nuevo tipo contacto.');
                  }
                })
         }
         else
         {
             Swal.fire('Faltan campos por diligenciar.');
             validado = 0;
         }

    });
});

//Validación Editar 

$(document).ready(function() {
    $("#editForm").submit(function(event){
         event.preventDefault();

         let validado = 0;

         if( $("#cidtipocontacto").val() == 0 )
         {
             $("#valCTipoContacto").text("* Debe elegir un tipo de contacto");
         }
         else
         {
             $("#valCTipoContacto").text("");
             validado++;
         }

         if(validaVacio($("#cnombre").val()) || $("#cnombre").val().length == 0 || $("#cnombre").val().length > 30)
         {
             $("#valCNombre").text("* Debe ingresar el nombre del contacto");
         }
         else
         {
             $("#valCNombre").text("");
             validado++;
         }
 
         if(validaVacio($("#capellido1").val()) || $("#capellido1").val().length == 0 || $("#capellido1").val().length > 30)
         {
             $("#valCApellido1").text("* Ingresar primer apellido del contacto");
         }
         else
         {
             $("#valCApellido1").text("");
             validado++;
         }
 
         if(validaVacio($("#capellido2").val()) || $("#capellido2").val().length == 0 || $("#capellido2").val().length > 30)
         {
             $("#valCApellido2").text("* Debe ingresar el segundo apellido del contacto.")
         }
         else{
             $("#valCApellido2").text("");
             validado++;
         }
 
         var documento = document.getElementById("cdocumento");
         if(documento.value == "" || documento.value == null || $("#cdocumento").val().length > 10 || $("#cdocumento").val().length < 7)
         {
             $("#valCDocumento").text("* Debe ingresar el número válido documento del contacto.");
         }
         else
         {
             $("#valCDocumento").text("");
             validado++;
         }

         if($("#ctelefono1").val().length == 0 || isNaN($("#ctelefono1").val()))
         {
             $("#valTel1").text("* Ingrese un número de telefono valido");
         }
         else if(!(/^\d{7,10}$/.test($("#ctelefono1").val())))
         {
          $("#valTel1").text("* Ingrese un número de celular de 10 dígitos.");
         }
         else{
             $("#valTel1").text("");
             validado++;
         }

         if($("#ctelefono2").val().length == 0 || isNaN($("#ctelefono2").val()))
         {
             $("#valTel2").text("* Ingrese un número de telefono valido");
         }
         else if(!(/^\d{7,10}$/.test($("#ctelefono2").val())))
         {
          $("#valTel2").text("* Ingrese un número de celular de 10 dígitos.");
         }
         else{
             $("#valTel2").text("");
             validado++;
         }
 
         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);
 
         if($("#ccorreo1").val().length == 0 || !emailRegex.test($("#ccorreo1").val()))
         {
             $("#valCCorreo1").text("* Ingrese un correo valido.");
         }
         else
         {
             $("#valCCorreo1").text("");
             validado++;
         }
 
         if($("#ccorreo2").val().length == 0 || !emailRegex.test($("#ccorreo2").val()))
         {
             $("#valCCorreo2").text("* Ingrese un correo valido.");
         }
         else
         {
             $("#valCCorreo2").text("");
             validado++;
         }
 
         console.log("validado: " + validado);
 
         if(validado == 9)
         {
            var fd = new FormData(document.getElementById("editForm"));

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "/cliente/guardar",
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                }).done(function(respuesta){
                  if(respuesta.ok)
                  {
                    Swal.fire('Se edito el contacto contacto.');
                     $("#exampleModal4").modal('hide');//ocultamos el modal
                     $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                     $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                     $("#mensaje").text("Nuevo contacto Creado")
                    var table = $('#tbl_contacto').DataTable();
                    table.ajax.reload();
                  }
                  else{
                    Swal.fire('Contacto no editado.');
                  }
                })
         }
         else
         {
             Swal.fire('Faltan campos por diligenciar.');
             validado = 0;
         }

        
    });
});

function limpiar()
{
    $("input").val("");
    $("select").val("");
    $("#valContacto").text("");
    $("#valNombre").text("");
    $("#valApellido1").text("");
    $("#valApellido2").text("");
    $("#valDocumento").text("");
    $("#valTelefono1").text("");
    $("#valTelefono2").text("");
    $("#valCorreo1").text("");
    $("#valCorreo2").text("");
}

$(document).ready(function(){

  $(".solo_numeros").on("keyup",function(){
       this.value = this.value.replace(/[^0-9]/g,'');
  });

  

  $(".sin_especiales").on("keyup",function(){
      this.value = this.value.replace(/[$%&/*-+¡?=)(/&#"!\-.|,;´¨}{[¿'|<>#]/g,''); 
 });


});

function soloLetras(e) {
  var key = e.keyCode || e.which,
  tecla = String.fromCharCode(key).toLowerCase(),
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
  especiales = [8, 39, 46],
  tecla_especial = false;
  
  for (var i in especiales) {
  if (key == especiales[i]) {
    tecla_especial = true;
    break;
  }
  }
  
  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
  return false;
  }
  }

  function validaVacio(valor) {
    valor = valor.replace("&nbsp;", "");
    valor = valor == undefined ? "" : valor;
    if (!valor || 0 === valor.trim().length) {
        return true;
        }
    else {
        return false;
        }
    }


  /* Delete customer */
$('body').on('click', '#delete-cliente', function (e) {
    e.preventDefault();
    
    x = confirm("Esta seguro de eliminar !");

    if (x){
        var cliente_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "POST", 
            url: "/cliente/eliminar/"+cliente_id,
            data: {
            "id": cliente_id,
            "_token": token,
            },
            success: function (data) {

            // $('#msg').html('Customer entry deleted successfully');
            // $("#empresa_id_" + empresa_id).remove();
            var table = $('#tbl_contacto').DataTable();
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

  
