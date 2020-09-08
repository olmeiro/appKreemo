$(document).ready(function(){

    $('#smartwizard').smartWizard({
    selected: 0,
    theme: 'dots',
    autoAdjustHeight:true,
    transitionEffect:'fade',
    showStepURLhash: false,
    
    });
    
});


$(document).ready(function(){

    $('#smartwizard2').smartWizard({
    selected: 0,
    theme: 'dots',
    autoAdjustHeight:true,
    transitionEffect:'fade',
    showStepURLhash: false,
    
    });
    
});

function limpiar()
{
    $("input").val("");
    $("select").val("");
    $("#valNit").text("");
    $("#valNombre").text("");
    $("#valNombreRep").text("");
    $("#valDireccion").text("");
    $("#valTelefono1").text("");
    $("#valCorreo1").text("");
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
  especiales = [8, 37, 39, 46],
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

$(document).ready(function(){
    $("#crearEmpresa").click(function(event){
        event.preventDefault();

        let validado = 0;

        if( $("#nit").val().length == 0 || $("#nit").val().length > 30)
        {
            $("#valNit").text("* Debe ingresar el nit de la empresa.");
        }
        else
        {
            $("#valNit").text("");
            validado++;
        }

        if( $("#nombre").val().length == 0 || $("#nombre").val().length > 30)
        {
            $("#valNombre").text("* Debe ingresar Razón Social.");
        }
        else
        {
            $("#valNombre").text("");
            validado++;
        }

        if($("#nombrerepresentante").val().length == 0 || $("#nombrerepresentante").val().length > 30)
        {
            $("#valNombreRep").text("* Ingresar nombre del representante.");
        }
        else
        {
            $("#valNombreRep").text("");
            validado++;
        }

        if($("#direccion").val().length == 0 || $("#direccion").val().length > 30)
        {
            $("#valDireccion").text("* Debe ingresar dirección de la empresa.")
        }
        else{
            $("#valDireccion").text("");
            validado++;
        }

        if($("#telefono1").val().length == 0 || isNaN($("#telefono1").val()))
         {
             $("#valTelefono1").text("* Ingrese un número de telefono válido.");
         }
         else if(!(/^\d{7,10}$/.test($("#telefono1").val())))
         {
          $("#valTelefono1").text("* Ingrese un número de celular de 10 dígitos.");
         }
         else{
             $("#valTelefono1").text("");
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
 
         console.log("validado: " + validado);
 
         if(validado == 6)
         {

            var fd = new FormData(document.getElementById("frmEmpresa"));

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/empresa/guardarNuevo",
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
                }).done(function(respuesta){
                  if(respuesta.ok)
                  {
                    Swal.fire('Se registro la empresa.');
                    $("#exampleModal2").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    limpiar();
                    var table = $('#tbl_empresa').DataTable();
                    table.ajax.reload();
                   // window.location.reload('/empresa');
             
                  }
                  else{
                    Swal.fire('No se puedo crear la nueva empresa.');
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


/* Delete customer */
$('body').on('click', '#delete-empresa', function () {
    var empresa_id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    confirm("Esta seguro de eliminar !");
    
    $.ajax({
        type: "DELETE", 
        url: "/empresa/eliminar/"+empresa_id,
        data: {
        "id": empresa_id,
        "_token": token,
        },
        success: function (data) {

        // $('#msg').html('Customer entry deleted successfully');
        // $("#empresa_id_" + empresa_id).remove();
        table.ajax.reload();
        },
        error: function (data) {
        console.log('Error:', data);
        }
    });
});

