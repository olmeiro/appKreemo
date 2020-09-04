$(document).ready(function() {
    $("#crearTipoContacto").click(function(event){
         event.preventDefault();

         if ($("#tipocontacto").val() == 0 ) {
              Swal.fire("Ingrese Tipo Contacto correcto.");
              $("#valTipoContacto").text("*Ingrese Tipo contacto nuevo.");
         }
         else
         {
            var fd = new FormData(document.getElementById("frmTipoContacto"));

            $.ajax({
                url: "/tipocontacto/guardar",
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
                }).done(function(respuesta){
                  if(respuesta.ok)
                  {
                    Swal.fire('Se registro el nuevo tipo contacto');
                    $("#exampleModal1").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    limpiar();
             
                  }
                  else{
                    Swal.fire('Ingrese nuevo tipo de contacto');
                  }
                })
         }
    });
});


function limpiar1()
{
    $("input").val("");
    $("select").val("");
    $("#valTipoContacto").text("");
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

function CierraPopup() {
    $("#exampleModal1").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }


