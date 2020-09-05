$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
        this.value = this.value.replace(/[0-9]/g,'');
    });
});

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

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

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8, 37, 39, 46];

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

$(document).ready(function(){
$("#FrmCrearOperario").submit(function(event){
    event.preventDefault();

    let validado = 0;

    if($("#nombre").val()==0){
        $("#validacion_nombre").text("*");
        $("#validacion_nombre2").text("Debe Ingresar el Nombre");
    }else{
        $("#validacion_nombre").text("");
        $("#validacion_nombre2").text("");
        validado++;
    }


    if($("#apellido").val()==0){
        $("#validacion_apellido").text("*");
        $("#validacion_apellido2").text("Debe Ingresar el Apellido");
    }else{
        $("#validacion_apellido").text("");
        $("#validacion_apellido2").text("");
        validado++;
    }

    if($("#documento").val()==0){
        $("#validacion_documento").text("*");
        $("#validacion_documento2").text("Debe Ingresar el Documento");
    }else{
        $("#validacion_documento").text("");
        $("#validacion_documento2").text("");
        validado++;
    }

    if($("#celular").val()==0){
        $("#validacion_celular").text("*");
        $("#validacion_celular2").text("Debe Ingresar el Celular");
    }else{
        $("#validacion_celular").text("");
        $("#validacion_celular2").text("");
        validado++;
    }

    if(validado==4){
        Swal.fire({
            title:'Registro exitoso',text:'Operaio creado!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
               //width: '50%',
            padding:'1rem',
               //background:'#000',
            backdrop:true,
               //toast: true,
            position:'center',
                });

        document.FrmCrearOperario.submit();
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
    $("#FrmEditarOperario").submit(function(event){
        event.preventDefault();

        let validado = 0;

        if($("#nombre").val()==0){
            $("#validacion_nombre").text("*");
            $("#validacion_nombre2").text("Debe Ingresar el Nombre");
        }else{
            $("#validacion_nombre").text("");
            $("#validacion_nombre2").text("");
            validado++;
        }


        if($("#apellido").val()==0){
            $("#validacion_apellido").text("*");
            $("#validacion_apellido2").text("Debe Ingresar el Apellido");
        }else{
            $("#validacion_apellido").text("");
            $("#validacion_apellido2").text("");
            validado++;
        }

        if($("#documento").val()==0){
            $("#validacion_documento").text("*");
            $("#validacion_documento2").text("Debe Ingresar el Documento");
        }else{
            $("#validacion_documento").text("");
            $("#validacion_documento2").text("");
            validado++;
        }

        if($("#celular").val()==0){
            $("#validacion_celular").text("*");
            $("#validacion_celular2").text("Debe Ingresar el Celular");
        }else{
            $("#validacion_celular").text("");
            $("#validacion_celular2").text("");
            validado++;
        }

        if(validado==4){
            Swal.fire({
                title:'Modificación exitosa',text:'Operaio Modificado!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });

            document.FrmEditarOperario.submit();
        }else{
            Swal.fire({
                title:'Error en la Modificación',text:'Error en los campos',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
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
