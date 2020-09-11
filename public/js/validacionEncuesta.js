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

        if($("#idservicio").val()==0){
            $("#valIdServicio").text("*");
            $("#valIdServicio2").text("Debe seleccionar un servicio");
        }else{
            $("#valIdServicio").text("");
            $("#valIdServicio2").text("");
            validado++;
        }

        if($("#directorobra").val()==0){
            $("#valDirectorObra").text("*");
            $("#valDirectorObra2").text("Director de obra no encontrado");
        }else{
            $("#valDirectorObra").text("");
            $("#valDirectorObra2").text("");
            validado++;
        }

        if($("#constructora").val()==0){
            $("#valConstructora").text("*");
            $("#valConstructora2").text("Constructora no encontrado");
        }else{
            $("#valConstructora").text("");
            $("#valConstructora2").text("");
            validado++;
        }

         const emailRegex = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);

        if($("#correo").val()==0){
            $("#valCorreo").text("*");
            $("#valCorreo2").text("Correo no encontrado");
        }else{
            $("#valCorreo").text("");
            $("#valCorreo2").text("");
            validado++;
        }

        if($("#celular").val()==0){
            $("#valCelular").text("*");
            $("#valCelular2").text("Celular no encontrado");
        }else{
            $("#valCelular").text("");
            $("#valCelular2").text("");
            validado++;
        }

        if($("#respuesta1_1").val()==0){
            $("#valRespuesta1_1").text("*");
            $("#valRespuesta1_12").text("Este campo es obligatorio");
        }else if($("#respuesta1_1").val().length <= 1 || $("#respuesta1_1").val().length >= 5){
            $("#valRespuesta1_1").text("*");
            $("#valRespuesta1_12").text("El valor debe estar entre 1 y 5");
        }else{
            $("#valRespuesta1_1").text("");
            $("#valRespuesta1_12").text("");
            validado++;
        }

        if($("#respuesta1_2").val()==0){
            $("#valRespuesta1_2").text("*");
            $("#valRespuesta1_22").text("Este campo es obligatorio");
        }else if($("#respuesta1_2").val().length <= 1 || $("#respuesta1_2").val().length >= 5){
            $("#valRespuesta1_2").text("*");
            $("#valRespuesta1_22").text("El valor debe estar entre 1 y 5");
        }else{
            $("#valRespuesta1_2").text("");
            $("#valRespuesta1_22").text("");
            validado++;
        }

        if($("#respuesta1_3").val()==0){
            $("#valRespuesta1_3").text("*");
            $("#valRespuesta1_32").text("Este campo es obligatorio");
        }else if($("#respuesta1_3").val().length <= 1 || $("#respuesta1_3").val().length >= 5){
            $("#valRespuesta1_3").text("*");
            $("#valRespuesta1_32").text("El valor debe estar entre 1 y 5");
        }else{
            $("#valRespuesta1_3").text("");
            $("#valRespuesta1_32").text("");
            validado++;
        }

        if($("#respuesta1_4").val()==0){
            $("#valRespuesta1_4").text("*");
            $("#valRespuesta1_42").text("Este campo es obligatorio");
        }else if($("#respuesta1_4").val().length <= 1 || $("#respuesta1_4").val().length >= 5){
            $("#valRespuesta1_4").text("*");
            $("#valRespuesta1_42").text("El valor debe estar entre 1 y 5");
        }else{
            $("#valRespuesta1_4").text("");
            $("#valRespuesta1_42").text("");
            validado++;
        }

        if($("#respuesta2").val()==0){
            $("#valRespuesta2").text("*");
            $("#valRespuesta22").text("Debe seleccionar una opción");
        }else{
            $("#valRespuesta2").text("");
            $("#valRespuesta22").text("");
            validado++;
        }

        // if($("#respuesta2") == "SI"){
        //     if($("#respuesta3").val()==0){
        //         $("#valRespuesta3").text("*");
        //         $("#valRespuesta32").text("Describa el problema del cliente");
        //     }else if($("#respuesta3").val().length >=300){
        //         $("#valRespuesta3").text("*");
        //         $("#valRespuesta32").text("Ha superado el tamaño de caracteres (300) ");
        //     }else{
        //         $("#valRespuesta3").text("");
        //         $("#valRespuesta32").text("");
        //         validado++;
        //     }
        // }

        if($("#respuesta4").val()==0){
            $("#valRespuesta4").text("*");
            $("#valRespuesta42").text("Debe seleccionar una opción");
        }else{
            $("#valRespuesta4").text("");
            $("#valRespuesta42").text("");
            validado++;
        }

        // if($("#respuesta3").val()==0){
        //     $("#valRespuesta3").text("*");
        //     $("#valRespuesta32").text("NO SE QUE VALIDAR JEJE");
        // }else if($("#respuesta3").val().length >= 300){
        //     $("#valRespuesta3").text("*");
        //     $("#valRespuesta32").text("Ha superado el tamaño de caracteres (300) ");
        // }else{
        //     $("#valRespuesta3").text("");
        //     $("#valRespuesta32").text("");
        //     validado++;
        // }

        if($("#respuesta6").val()==0){
            $("#valRespuesta6").text("*");
            $("#valRespuesta62").text("Debe seleccionar una opción");
        }else{
            $("#valRespuesta6").text("");
            $("#valRespuesta62").text("");
            validado++;
        }

        if($("#respuesta7").val()==0){
            $("#valRespuesta7").text("*");
            $("#valRespuesta72").text("Debe seleccionar una opción");
        }else{
            $("#valRespuesta7").text("");
            $("#valRespuesta72").text("");
            validado++;
        }

        console.log("validado: " + validado);

        // if (validado == 13)
        // {
        //     Swal.fire({
        //         title:'Registro exitoso',text:'Encuesta creada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
        //            //width: '50%',
        //         padding:'1rem',
        //            //background:'#000',
        //         backdrop:true,
        //            //toast: true,
        //         position:'center',
        //             });

        //     document.FrmEncuesta.submit();
        // }
        // else{
        //     Swal.fire({
        //         title:'Error en la creacion',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
        //            //width: '50%',
        //         padding:'1rem',
        //            //background:'#000',
        //         backdrop:true,
        //            //toast: true,
        //         position:'center',
        //     });
        //     // alert("Campos pendientes por validar");
        //     validado = 0;
        // }

    });
});
