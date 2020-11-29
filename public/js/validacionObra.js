$(document).ready(function(){
    $("#frmCreateObra").submit(function(event){

        event.preventDefault();

        let validado = 0;

        if( $("#idempresa").val() == 0 )
        {
            $("#valIdEmpresa").text("* Debe elegir una empresa.");
        }
        else
        {
            $("#valIdEmpresa").text("");
            validado++;
        }

        if( $("#nombre").val().length == 0 || $("#nombre").val().length > 30)
        {
            $("#valNombre").text("* Debe ingresar nombre de la obra.");
        }
        else
        {
            $("#valNombre").text("");
            validado++;
        }

        if($("#direccion").val().length == 0 || $("#direccion").val().length > 100)
        {
            $("#valDireccion").text("* Debe ingresar dirección de la obra.")
        }
        else{
            $("#valDireccion").text("");
            validado++;
        }

        if($("#telefono1").val().length == 0 || isNaN($("#telefono1").val()))
         {
             $("#valTelefono1").text("* Ingrese un número de teléfono de la obra.");
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
             $("#valCorreo1").text("* Ingrese un correo electrónico.");
         }
         else
         {
             $("#valCorreo1").text("");
             validado++;
         }

        console.log('validado: '+ validado);

        if (validado == 5)
        {
            Swal.fire({
                title:'Proceso exitoso.',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                padding:'1rem',
                backdrop:true,
                position:'center',
                    });
            document.frmCreateObra.submit();
            limpiar();
        }
        else{
            Swal.fire({
                title:'Error en el proceso.',text:'Campos pendientes por validar.',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                padding:'1rem',
                backdrop:true,
                position:'center',
            });
            validado = 0;
        }
    })
})

// Editar Obra

$(document).ready(function(){
    $("#editForm").submit(function(event){

        event.preventDefault();

        let validado = 0;

        if( $("#oidempresa").val() == 0 )
        {
            $("#valOIdEmpresa").text("* Debe elegir una empresa.");
        }
        else
        {
            $("#valOIdEmpresa").text("");
            validado++;
        }

        if( $("#onombre").val().length == 0 || $("#onombre").val().length > 30)
        {
            $("#valNombre").text("* Debe ingresar nombre de la obra.");
        }
        else
        {
            $("#valNombre").text("");
            validado++;
        }

        if($("#odireccion").val().length == 0 || $("#odireccion").val().length > 100)
        {
            $("#valDireccion").text("* Debe ingresar dirección de la obra.")
        }
        else{
            $("#valDireccion").text("");
            validado++;
        }

        if($("#otelefono1").val().length == 0 || isNaN($("#otelefono1").val()))
        {
            $("#valTelefono1").text("* Ingrese un número de teléfono de la obra.");
        }
        else if(!(/^\d{7,10}$/.test($("#otelefono1").val())))
        {
         $("#valTelefono1").text("* Ingrese un número de celular de 10 dígitos.");
        }
        else{
            $("#valTelefono1").text("");
            validado++;
        }

         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);

         if($("#ocorreo1").val().length == 0 || !emailRegex.test($("#ocorreo1").val()))
         {
             $("#valCorreo1").text("* Ingrese un correo electrónico.");
         }
         else
         {
             $("#valCorreo1").text("");
             validado++;
         }

        console.log('validado: '+ validado);

        if (validado == 5)
        {
            var fd = new FormData(document.getElementById("editForm"));

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/obra/actualizar",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                }).done(function(respuesta){
                    if(respuesta.ok)
                    {
                        Swal.fire({
                            title:'Proceso exitoso.',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                            backdrop:true,
                            position:'center',
                                });
                       $("#verModal5").modal('hide');//ocultamos el modal
                       $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                       $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                      var table = $('#tbl_obra').DataTable();
                      table.ajax.reload();
                    }
                    else{
                        Swal.fire({
                            title:'Error en el proceso.',text:'Campos pendientes por validar.',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                            padding:'1rem',
                            backdrop:true,
                            position:'center',
                        });
                    }
                })
        }else{
            Swal.fire({
                title:'Error en el proceso.',text:'Campos pendientes por validar.',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                padding:'1rem',
                backdrop:true,
                position:'center',
            });
             validado = 0;
        }
    })
})

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
    $("#valIdEmpresa").text("");
    $("#valIdEmpresa").text("");
    $("#valNombre").text("");
    $("#valDireccion").text("");
    $("#valTelefono1").text("");
    $("#valCorreo1").text("");

}

/* Delete customer */
$('body').on('click', '#delete-obra', function (e) {
    e.preventDefault();

    Swal.fire({
        title: '¿Está seguro que desea eliminar?',
        type: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar',
    }).then((choice) => {
        if (choice.value === true) {
          var obra_id = $(this).data("id");
          var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
              type: "POST",
              url: "/obra/eliminar/"+obra_id,
              data: {
              "id": obra_id,
              "_token": token,
              },
          }).done(function(respuesta){
            if(respuesta.ok){

                Swal.fire({
                title:'Proceso exitoso.',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                padding:'1rem',
                backdrop:true,
                position:'center',
                    });
                var table = $('#tbl_obra').DataTable();
                table.ajax.reload();
                } else {
                    Swal.fire({
                      title:'No se puede borrar.', icon: 'info', text:'La obra está en uso.',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                        padding:'1rem',
                      backdrop:true,
                      position:'center',
                    });
                }
            });
        }
    });
});
