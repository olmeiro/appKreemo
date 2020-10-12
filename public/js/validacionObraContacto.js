$(document).ready(function(){
    $("#crearObraContacto").click(function(event){

        event.preventDefault();

        let validado = 0;

        if( $("#nombre").val().length == 0 || $("#nombre").val().length > 30)
        {
            $("#valNombre").text("* Debe ingresar nombre de la obra.");
        }
        else
        {
            $("#valNombre").text("");
            validado++;
        }

        //-----------------------------

        if($("#direccion").val().length == 0 || $("#direccion").val().length > 30)
        {
            $("#valDireccion").text("* Debe ingresar dirección de la obra.")
        }
        else{
            $("#valDireccion").text("");
            validado++;
        }

        //-----------------------------

        
        if($("#telefono1").val().length == 0 || isNaN($("#telefono1").val()))
         {
             $("#valTelefono1").text("* Ingrese un número de telefono de la obra.");
         }
         else if(!(/^\d{7,10}$/.test($("#telefono1").val())))
         {
          $("#valTelefono1").text("* Ingrese un número de celular de 10 dígitos.");
         }
         else{
             $("#valTelefono1").text("");
             validado++;
         }

        //-----------------------------

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
         
         //----------------------------- validacion de los contactos de obras::

         if( $("#contactos").val() == 0)
        {
            $("#valContactos").text("* Debe ingresar contactos de la obra.");
        }
        else
        {
            $("#valContactos").text("");
            validado++;
        }
        //----------------------------

        console.log('validado: '+ validado);

        if (validado == 5)
        {
            //alert("buena validacion");
            //var fd = new FormData(document.getElementById("frmEmpresa"));

            document.formObraContacto.submit();
        }
        else{
            Swal.fire('Verifica los campos!');
        }


    })
})


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

