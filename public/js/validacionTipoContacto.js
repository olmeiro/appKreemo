$(document).ready(function() {
    $("#crearTipoContacto").click(function(event){
         event.preventDefault();

         if ($("#tipocontacto").val() == null || $("#tipocontacto").val().length==0) {
              Swal.fire("Ingrese Tipo Contacto correcto.");
              $("#tipocontacto").val("");
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
                    //CierraPopup();
             
                  }
                  else{
                    Swal.fire('Ingrese nuevo tipo de contacto');
                  }
                })
         }
    });
});

$(document).ready(function() {
    $("#crearContacto").click(function(event){
        Swal.fire('Any fool can use a computer')
         event.preventDefault();

         let validado = 0;

         if( $("#idtipocontacto").val().length == 0 )
         {
             $("#valTipoContacto").text("* Debe elegir un tipo de contacto");
         }
         else
         {
             $("#valTipoContacto").text("");
             validado++;
         }

         if( $("#nombre").val().length == 0 || $("#nombre").val().length > 30)
         {
             $("#valNombre").text("* Debe ingresar el nombre del contacto");
         }
         else
         {
             $("#valNombre").text("");
             validado++;
         }
 
         if($("#apellido1").val().length == 0 || $("#apellido1").val().length > 30)
         {
             $("#valApellido1").text("* Ingresar primer apellido del contacto");
         }
         else
         {
             $("#valApellido1").text("");
             validado++;
         }
 
         if($("#apellido2").val().length == 0 || $("#apellido2").val().length > 30)
         {
             $("#valApellido2").text("* Debe ingresar el segundo apellido del contacto.")
         }
         else{
             $("#valApellido2").text("");
             validado++;
         }
 
         var tipodocumento = document.getElementById("documento");
         if(tipodocumento.value == "" || tipodocumento.value == null)
         {
             $("#valDocumento").text("* Debe ingresar el número de documento del contacto.");
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
         else{
             $("#valTelefono1").text("");
             validado++;
         }

         if($("#telefono2").val().length == 0 || isNaN($("#telefono2").val()))
         {
             $("#valTelefono2").text("* Ingrese un número de telefono valido");
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
                url: "/cliente/guardar",
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
                }).done(function(respuesta){
                  if(respuesta.ok)
                  {
                    Swal.fire('Se registro el nuevo tipo contacto.');
                    $("#exampleModal1").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
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


function limpiar()
{
    $('#exampleModal2').modal('hide');
    $("input").val("");
    $("select").val("");
    $("span").val("");
    window.location.href = "/cliente";
}

$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
         this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
         this.value = this.value.replace(/[0-9]/g,'');
    });

    $(".sin_especiales").on("keyup",function(){
        this.value = this.value.replace(/[$%&/*-+¡?=)(/&#"!\-.|,;´¨}{[¿'|<>#]/g,''); 
   });


});

function CierraPopup() {
    $("#exampleModal1").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }


