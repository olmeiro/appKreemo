$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
        this.value = this.value.replace(/[0-9]/g,'');
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

function soloNumeros(e) {
    var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " 0123456789",
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

function limpiar()
{
    $("input").val("");
    $("select").val("");
    $("#valDirectorObra").text("");
    $("#valConstructora").text("");
    $("#valCorreo").text("");
    $("#valCelular").text("");
    $("#valMes").text("");
    $("#valRespuesta1_1").text("");
    $("#valRespuesta1_2").text("");
    $("#valRespuesta1_3").text("");
    $("#valRespuesta1_4").text("");
    $("#valRespuesta3").text("");
    $("#valRespuesta5").text("");
}


$(document).ready(function() {
    $("#frmEncuesta").click(function(event){
         event.preventDefault();

         let validado = 0;

         if( $("#idservicio").val() == 0 )
         {
             $("#valIdServicio").text("* Debe elegir un servicio");
         }
         else
         {
             $("#valIdServicio").text("");
             validado++;
         }

         if( $("#directorobra").val().length == 0 || $("#directorobra").val().length > 30)
         {
             $("#valDirectorObra").text("* Debe ingresar el nombre del director");
         }
         else
         {
             $("#valDirectorObra").text("");
             validado++;
         }

         if($("#constructora").val().length == 0 || $("#constructora").val().length > 30)
         {
             $("#valConstructora").text("* Ingresar la constructora");
         }
         else
         {
             $("#valConstructora").text("");
             validado++;
         }

         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);

         if($("#correo").val().length == 0 || !emailRegex.test($("#correo").val()))
        {
            $("#valCorreo").text("* Ingrese un correo valido.");
        }
        else
        {
            $("#valCorreo").text("");
            validado++;
        }


        if($("#celular").val().length == 0 || isNaN($("#celular").val()))
        {
            $("#valCelular").text("* Ingrese un número de telefono valido");
        }
        else if(!(/^\d{7,10}$/.test($("#valCelular").val())))
        {
        $("#valCelular").text("* Ingrese un número de celular de 10 dígitos.");
        }
        else{
            $("#valCelular").text("");
            validado++;
        }

        if( $("#respuesta1_1").val() == 0 )
        {
            $("#valRespuesta1_1").text("* Este campo es obligatorio");
        }
        else
        {
            $("#valRespuesta1_1").text("");
            validado++;
        }

        if( $("#respuesta1_2").val().min == 1 || $("#respuesta1_2").val().max == 5)
        {
            $("#valRespuesta1_2").text("* Este campo es obligatorio");
        }
        else
        {
            $("#valRespuesta1_2").text("");
            validado++;
        }

        if( $("#respuesta1_3").val().min == 1 || $("#respuesta1_3").val().max == 5)
        {
            $("#valRespuesta1_3").text("* Este campo es obligatorio");
        }
        else
        {
            $("#valRespuesta1_3").text("");
            validado++;
        }

        if( $("#respuesta1_4").val().min == 1 || $("#respuesta1_4").val().max == 5)
        {
            $("#valRespuesta1_4").text("* Este campo es obligatorio");
        }
        else
        {
            $("#valRespuesta1_4").text("");
            validado++;
        }

        if( $("#respuesta2").val() == 0 )
         {
             $("#valRespuesta2").text("* Debe elegir una opción");
         }
         else
         {
             $("#valRespuesta2").text("");
             validado++;
         }

        //  if($("#respuesta3").val().length == 0 || $("#respuesta3").val().length > 300)
        //  {
        //      $("#valRespuesta3").text("* Ingrese las observaciones");
        //  }
        //  else
        //  {
        //      $("#valRespuesta3").text("");
        //      validado++;
        //  }

        if( $("#respuesta4").val() == 0 )
        {
            $("#valRespuesta4").text("* Debe elegir una opción");
        }
        else
        {
            $("#valRespuesta4").text("");
            validado++;
        }

        //  if($("#respuesta5").val().length == 0 || $("#respuesta5").val().length > 300)
        //  {
        //      $("#valRespuesta5").text("* Ingrese las observaciones");
        //  }
        //  else
        //  {
        //      $("#valRespuesta5").text("");
        //      validado++;
        //  }

        if( $("#respuesta6").val() == 0 )
        {
            $("#valRespuesta6").text("* Debe elegir una opción");
        }
        else
        {
            $("#valRespuesta6").text("");
            validado++;
        }

        if( $("#respuesta7").val() == 0 )
        {
            $("#valRespuesta7").text("* Debe elegir una opción");
        }
        else
        {
            $("#valRespuesta7").text("");
            validado++;
        }

         console.log("validado: " + validado);

         if(validado == 13)
         {
            //var fd = new FormData(document.getElementById("frmEncuesta"));

            // $.ajax({
            //     url: "/encuesta/guardar",
            //     type: "POST",
            //     data: fd,
            //     processData: false,  // tell jQuery not to process the data
            //     contentType: false   // tell jQuery not to set contentType
            //     }).done(function(respuesta){
            //       if(respuesta.ok)
            //       {
            //         Swal.fire('Se registro la encuesta.');
            //         $("#exampleModal").modal('hide');//ocultamos el modal
            //         $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
            //         $('.modal-backdrop').remove();//eliminamos el backdrop del modal
            //         var table = $('#tbl_encuesta').DataTable();
            //         table.ajax.reload();
            //         limpiar();
            //       }
            //       else{
            //         Swal.fire('No se puedo crear la encuesta.');
            //       }
            //     })
            Swal.fire('Llegó :D');
         }
        //  else
        //  {
        //      Swal.fire('Faltan campos por diligenciar.');
        //      validado = 0;
        //  }

    });
});
