$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
        this.value = this.value.replace(/[0-9]/g,'');
    });
});

$(document).ready(function(){
    $("#FrmCrearMaquinaria").submit(function(event){
        event.preventDefault();

        let validado = 0;

        if($("#serialequipo").val()==0){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe Ingresar el serial del equipo");
        }else if($("#serialequipo").val().length < 7 || $("#serialequipo").val().length >= 20){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe estar entre 7 y 20");
        }else{
            $("#validacion_serialequipo").text("");
            $("#validacion_serialequipo2").text("");
            validado++;
        }

        if ($("#modelo").val()==0) {
            $("#validacion_modelo").text("*");
            $("#validacion_modelo2").text("Debe Ingresar el modelo");
        }else{
            $("#validacion_modelo").text("");
            $("#validacion_modelo2").text("");
            validado++;
        }

        if ($("#serialmotor").val()==0) {
            $("#validacion_serialmotor").text("*");
            $("#validacion_serialmotor2").text("Debe Ingresar el serial del motor");
        }else{
            $("#validacion_serialmotor").text("");
            $("#validacion_serialmotor2").text("");
            validado++;
        }

        if($("#observacion").val()==0){
            $("#validacion_observacion").text("*");
            $("#validacion_observacion2").text("Debe Ingresar la Observacion");
        }else{
            $("#validacion_observacion").text("");
            $("#validacion_observacion2").text("");
            validado++;
        }

        if(validado==4){
            Swal.fire({
                title:'Registro exitoso',text:'Maquina creada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });

            document.FrmCrearMaquinaria.submit();
        }else{
            Swal.fire({
                title:'Error en la creacion',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
            });
        }
    });
});

$(document).ready(function(){
    $("#FrmEditarMaquinaria").submit(function(event){
        event.preventDefault();

        let validado = 0;

        if($("#serialequipo").val()==0){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe Ingresar el serial del equipo");
        }else if($("#serialequipo").val().length < 7 || $("#serialequipo").val().length >= 20){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe estar entre 7 y 20");
        }else{
            $("#validacion_serialequipo").text("");
            $("#validacion_serialequipo2").text("");
            validado++;
        }

        if ($("#modelo").val()==0) {
            $("#validacion_modelo").text("*");
            $("#validacion_modelo2").text("Debe Ingresar el modelo");
        }else{
            $("#validacion_modelo").text("");
            $("#validacion_modelo2").text("");
            validado++;
        }

        if ($("#serialmotor").val()==0) {
            $("#validacion_serialmotor").text("*");
            $("#validacion_serialmotor2").text("Debe Ingresar el serial del motor");
        }else{
            $("#validacion_serialmotor").text("");
            $("#validacion_serialmotor2").text("");
            validado++;
        }

        if($("#observacion").val()==0){
            $("#validacion_observacion").text("*");
            $("#validacion_observacion2").text("Debe Ingresar la Observacion");
        }else{
            $("#validacion_observacion").text("");
            $("#validacion_observacion2").text("");
            validado++;
        }

        if(validado==4){
            Swal.fire({
                title:'Cambio exitoso',text:'Maquina Modificada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });

            document.FrmEditarMaquinaria.submit();
        }else{
            Swal.fire({
                title:'Error en editar',text:'Error en los cambios',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
            });
        }
    });
});
