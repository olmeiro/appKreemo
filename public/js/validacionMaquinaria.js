$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
        this.value = this.value.replace(/[0-9]/g,'');
    });
});

$(document).ready(function(){
    $("#FrmMaquinaria").submit(function(event){
        event.preventDefault();

        let validado = 0;

        if($("#serialequipo").val()==0){
            $("#validacion_serialequipo").text("*");
            $("#validacion_serialequipo2").text("Debe Ingresar el serial del equipo");
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
    });
})
