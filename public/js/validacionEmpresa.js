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

//   Validacion Crear Empresa

function soloNumeros(e) {
    var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " 0123456789",
    especiales = [45],
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

        if( validaVacio($("#nit").val()) || $("#nit").val().length == 0 || $("#nit").val().length < 6)
        {
            $("#valNit").text("* Debe ingresar el nit de la empresa.");
        }
        else
        {
            $("#valNit").text("");
            validado++;
        }

        if(validaVacio($("#nombre").val()) || $("#nombre").val().length < 3 || $("#nombre").val().length ==  0)
        {
            $("#valNombre").text("* Debe ingresar Razón Social.");
        }
        else
        {
            $("#valNombre").text("");
            validado++;
        }

        if(validaVacio($("#nombrerepresentante").val()) || $("#nombrerepresentante").val().length == 0 ||  $("#nombrerepresentante").val().length < 2)
        {
            $("#valNombreRep").text("* Ingresar nombre del representante.");
        }
        else
        {
            $("#valNombreRep").text("");
            validado++;
        }

        if(validaVacio($("#direccion").val()) || $("#direccion").val().length == 0)
        {
            $("#valDireccion").text("* Debe ingresar dirección de la empresa.")
        }
        else{
            $("#valDireccion").text("");
            validado++;
        }

        if(validaVacio($("#telefono1").val()) || isNaN($("#telefono1").val()))
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

         if(validaVacio($("#correo1").val()) || !emailRegex.test($("#correo1").val()))
         {
             $("#valCorreo1").text("* Ingrese un correo válido.");
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

// Validacion Editar Empresa

$(document).ready(function() {
    $("#editEmpresaFrm").submit(function(event){
         event.preventDefault();
         let validado = 0;

        if(validaVacio($("#enit").val()) || $("#enit").val().length == 0 || $("#enit").val().length < 6)
        {
            $("#valENit").text("* Debe ingresar el nit de la empresa.");
        }
        else
        {
            $("#valENit").text("");
            validado++;
        }

        if(validaVacio($("#enombre").val()) || $("#enombre").val().length < 3 || $("#enombre").val().length == 0)
        {
            $("#valENombre").text("* Debe ingresar Razón Social.");
        }
        else
        {
            $("#valENombre").text("");
            validado++;
        }

        if(validaVacio($("#enombrerepresentante").val()) || $("#enombrerepresentante").val().length == 0 || $("#enombrerepresentante").val().length < 2)
        {
            $("#valENombreRep").text("* Ingresar nombre del representante.");
        }
        else
        {
            $("#valENombreRep").text("");
            validado++;
        }

        if(validaVacio($("#edireccion").val()) || $("#edireccion").val().length == 0 || $("#edireccion").val().length < 5 )
        {
            $("#valEDireccion").text("* Debe ingresar dirección de la empresa válida.")
        }
        else{
            $("#valEDireccion").text("");
            validado++;
        }

        if(validaVacio($("#etelefono1").val()) || $("#etelefono1").val().length == 0 || isNaN($("#etelefono1").val()) || $("#etelefono1").val().length < 7 || $("#etelefono1").val().length > 10 )
         {
             $("#valETelefono1").text("* Ingrese un número de telefono válido.");
         }
         else{
             $("#valETelefono1").text("");
             validado++;
         }

         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);

         if($("#ecorreo1").val().length == 0 || !emailRegex.test($("#ecorreo1").val()))
         {
             $("#valECorreo1").text("* Ingrese un correo válido.");
         }
         else
         {
             $("#valECorreo1").text("");
             validado++;
         }

         console.log("validado: " + validado);

         if(validado == 6)
         {
            var fd = new FormData(document.getElementById("editEmpresaFrm"));

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "/empresa/guardar",
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                }).done(function(respuesta){
                  if(respuesta.ok)
                  {
                    Swal.fire('Se editó la empresa.');
                     $("#exampleModal4").modal('hide');//ocultamos el modal
                     $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                     $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    var table = $('#tbl_empresa').DataTable();
                    table.ajax.reload();
                  }
                  else{
                    Swal.fire('Empresa no editada.');
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
$('body').on('click', '#delete-empresa', function (e) {
    e.preventDefault();

    x = confirm("¿Esta seguro de eliminar?");

    if (x){
        var empresa_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "POST",
            url: "/empresa/eliminar/"+empresa_id,
            data: {
            "id": empresa_id,
            "_token": token,
            },
        })
            .done(function(respuesta){
                if(respuesta && respuesta.ok){
                    Swal.fire({
                      title:'Empresa eliminada',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                      padding:'1rem',
                      backdrop:true,
                      position:'center',
                          });
                        var table = $('#tbl_empresa').DataTable();
                        table.ajax.reload();
                } else {


                  Swal.fire({
                    title:'No se puede borrar',text:'La empresa está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                     padding:'1rem',
                    backdrop:true,
                    position:'center',
                });
                var table = $('#tbl_empresa').DataTable();
                    table.ajax.reload();
                }

              })

    }
    else
    {
    return false;
    }
});





