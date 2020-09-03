$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
        this.value = this.value.replace(/[0-9]/g,'');
    });
});


$(document).ready(function() {
    $("#FrmCrearEstado").submit(function(event){
        event.preventDefault();
        // alert("llega");
        let validado=0;

        if ($("#Estado_Cotizacion").val() == 0) {

            $("#val_estado_coti").text("*");
            $("#val_estado_coti2").text("Debes ingresar un  estado");
        }else{

            $("#val_estado_coti").text("");
            $("#val_estado_coti2").text("");
            validado++;
        }

        if (validado==1)
        {
            Swal.fire({
                title:'Registro exitoso',text:'Estado agregado',icon:'success',footer:'<span class="rojo">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });
            document.FrmCrearEstado.submit();
        }
        else{
            Swal.fire({
                title:'Error en la creacion',text:'Campos pendientes por validar',icon:'error',footer:'<span class="rojo">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });

            // alert("Campos pendientes por validar");


            validado = 0;
        }

    });
});
