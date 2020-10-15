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
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
                    window.location.reload('/clientes');
             
                  }
                  else{
                    Swal.fire('Ingrese nuevo tipo de contacto');
                  }
                })
         }
    });
});



// Eliminar Tipo Contacto

$('body').on('click', '#eliminar-tipoContacto', function (e) {
  e.preventDefault();
  
  x = confirm("Esta seguro de eliminar !");

  if (x){
      var tipo_id = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
          type: "POST", 
          url: "/tipocontacto/eliminar/"+tipo_id,
          data: {
          "id": tipo_id,
          "_token": token,
          },
      })
          .done(function(respuesta){
              if(respuesta && respuesta.ok){
                  Swal.fire({
                    title:'Tipo contacto eliminado.',text:'',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    padding:'1rem',
                    backdrop:true,
                    position:'center',
                        });
                      var table = $('#tbl_tipocontacto').DataTable();    
                      table.ajax.reload();
              } else {
                  

                Swal.fire({
                  title:'No se puede borrar',text:'Tipo contacto está en uso',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                   padding:'1rem',
                  backdrop:true,
                  position:'center',
              });
              var table = $('#tbl_tipocontacto').DataTable();    
                  table.ajax.reload();
              }
          
            })
    
  }
  else
  {
  return false;
  }
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


