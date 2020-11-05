function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}



$(document).ready(function() {
    $("#FrmEditarEstadoCotizacion").submit(function(event){
        event.preventDefault();
        let validado=0;

        if ($("#IdEstado").val() == 0) {

            $("#val_IdEstado").text("*");
            $("#val_IdEstado2").text("Debes ingresar un  estado");
        }else{
            $("#val_IdEstado").text("");
            $("#val_IdEstado2").text("");
            validado++;
        }

        if (validado==1)
        {
            Swal.fire({
                title:'Proceso exitoso.',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                padding:'1rem',
                backdrop:true,
                position:'center',
                    });

            document.FrmEditarEstadoCotizacion.submit();
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
    });
});
