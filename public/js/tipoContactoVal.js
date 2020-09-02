$(document).ready(function() {
    $("#crearTipoContacto").click(function(event){
         event.preventDefault();

         if ($("#tipocontacto").val().length==0 ) {
              alert(" No se ingreso Tipo Contacto alguno.");
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
                    
                    alert("Se registro el nuevo tipo contacto");
                    //limpiar();
        
                  }
                  else{
                    alert("No se puedo crear el nuevo tipo contacto");
                  }
                })
         }
    });
});

$(document).ready(function() {
    $("#crearContacto").click(function(event){
        //Swal.fire('Any fool can use a computer')
         event.preventDefault();

         let validado = 0;

         if( $("#Nombre").val().length == 0 || $("#Nombre").val().length > 30)
         {
             $("#valNombre").text("* Debe ingresar el nombre del contacto");
         }
         else
         {
             $("#valNombre").text("");
             validado++;
         }
 
         if($("#Apellido_1").val().length == 0 || $("#Apellido_1").val().length > 30)
         {
             $("#valApellido1").text("* Ingresar primer apellido del contacto");
         }
         else
         {
             $("#valApellido1").text("");
             validado++;
         }
 
         if($("#Apellido_2").val().length == 0 || $("#Apellido_2").val().length > 30)
         {
             $("#valApellido2").text("* Debe ingresar el segundo apellido del contacto.")
         }
         else{
             $("#valApellido2").text("");
             validado++;
         }
 
         var tipodocumento = document.getElementById("Documento");
         if(tipodocumento.value == "" || tipodocumento.value == null)
         {
             $("#valDocumento").text("* Debe ingresar el número de documento del contacto.");
         }
         else
         {
             $("#valDocumento").text("");
             validado++;
         }
 
         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);
 
         if($("#Correo").val().length == 0 || !emailRegex.test($("#Correo").val()))
         {
             $("#valCorreo").text("* Ingrese un correo valido.");
         }
         else
         {
             $("#valCorreo").text("");
             validado++;
         }
 
         if($("#Telefono").val().length == 0 || isNaN($("#Telefono").val()))
         {
             $("#valTelefono").text("* Ingrese un número de telefono valido");
         }
         else{
             $("#valTelefono").text("");
             validado++;
         }
 
         if($("#Cargo").val().length == 0 || $("#Cargo").val().length > 20)
         {
             $("#valCargo").text("* Ingrese un cargo para el contacto.");
         }
         else{
             $("#valCargo").text("");
             validado++;
         }
 
         if($("#Estado").val().length == 0 )
         {
             $("#valEstado").text("* Seleccione un estado para el cliente.");
         }
         else
         {
             $("#valEstado").text("");
             validado++;
         }

         if($("#Estado").val().length == 0 )
         {
             $("#valEstado").text("* Seleccione un estado para el cliente.");
         }
         else
         {
             $("#valEstado").text("");
             validado++;
         }
 
         console.log("validado: " + validado);
 
         if(validado == 9)
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
                    
                    alert("Se registro el nuevo tipo contacto");
                    //limpiar();
        
                  }
                  else{
                    alert("No se puedo crear el nuevo tipo contacto");
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

