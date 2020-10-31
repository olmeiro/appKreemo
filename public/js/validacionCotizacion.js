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

$(document).ready(function() {
    $("#FrmCrearCotizacion").submit(function(event){
        event.preventDefault();

        let validado=0;

        if ($("#IdEmpresa").val() == 0) {
            $("#val_empresa").text("*");
            $("#val_empresa2").text("Debe ingresar la Empresa");
        }else{
            $("#val_empresa").text("");
            $("#val_empresa2").text("");
            validado++;
        }

        if ($("#IdEstado").val() == 0) {
            $("#val_Estado").text("*");
            $("#val_Estado2").text("Debe Seleccionar un Estado");
        }else{
            $("#val_Estado").text("");
            $("#val_Estado2").text("");
            validado++;
        }

        if ($("#IdModalidad").val() == 0) {
            $("#val_Modalidad").text("*");
            $("#val_Modalidad2").text("Debe Seleccionar una Modalidad");
        }else{
            $("#val_Modalidad").text("");
            $("#val_Modalidad2").text("");
            validado++;
        }

        if ($("#IdEtapa").val() == 0) {
            $("#val_Etapa").text("*");
            $("#val_Etapa2").text("Debe Seleccionar una Etapa");
        }else{
            $("#val_Etapa").text("");
            $("#val_Etapa2").text("");
            validado++;
        }

        if ($("#IdJornada").val() == 0) {
            $("#val_Jornada").text("*");
            $("#val_Jornada2").text("Debe Seleccionar una Jornada");
        }else{
            $("#val_Jornada").text("");
            $("#val_Jornada2").text("");
            validado++;
        }

        if ($("#IdTipo_Concreto").val() == 0) {
            $("#val_TipoConcreto").text("*");
            $("#val_TipoConcreto2").text("Debe Seleccionar un Tipo de Concreto");
        }else{
            $("#val_TipoConcreto").text("");
            $("#val_TipoConcreto2").text("");
            validado++;
        }

        if ($("#IdObra").val() == 0) {
            $("#val_Obra").text("*");
            $("#val_Obra2").text("Debe Seleccionar una Obra");
        }else{
            $("#val_Obra").text("");
            $("#val_Obra2").text("");
            validado++;
        }

        if ($("#FechaCotizacion").val().length == 0) {
            $("#val_FechaCotizacion").text("*");
            $("#val_FechaCotizacion2").text("Debe Seleccionar una fecha");
            $("#val_FechaCotizacion3").text("Debe Seleccionar una fecha");
        }else{
            $("#val_FechaCotizacion").text("");
            $("#val_FechaCotizacion2").text("");
            $("#val_FechaCotizacion3").text("");
            validado++;
        }

        if ($("#InicioBombeo").val().length == 0) {
            $("#val_FechaInicio").text("*");
            $("#val_FechaInicio2").text("Debe Seleccionar una fecha");
            $("#val_FechaInicio3").text("Debe Seleccionar una fecha");
        }else{
            $("#val_FechaInicio").text("");
            $("#val_FechaInicio2").text("");
            $("#val_FechaInicio3").text("");
            validado++;
        }

        // if ($("#Ciudad").val() == 0) {
        //     $("#val_ciudad").text("*");
        //     $("#val_ciudad2").text("Debe ingresar la ciudad");
        //     $("#val_ciudad3").text("Debe ingresar la ciudad");
        // }else{
        //     $("#val_ciudad").text("");
        //     $("#val_ciudad2").text("");
        //     $("#val_ciudad3").text("");
        //     validado++;
        // }

        // if ($("#Losas").val() == 0) {
        //     $("#val_Losas").text("*");
        //     $("#val_Losas2").text("Debe ingresar la cantidad de losas");
        //     $("#val_Losas3").text("Debe ingresar la cantidad de losas");
        // }else{
        //     $("#val_Losas").text("");
        //     $("#val_Losas2").text("");
        //     $("#val_Losas3").text("");
        //     validado++;
        // }

        // if ($("#Tuberia").val() == 0) {
        //     $("#val_Tuberia").text("*");
        //     $("#val_Tuberia2").text("Debe ingresar la cantidad de tuberia");
        //     $("#val_Tuberia3").text("Debe ingresar la cantidad de tuberia");
        // }else{
        //     $("#val_Tuberia").text("");
        //     $("#val_Tuberia2").text("");
        //     $("#val_Tuberia3").text("");
        //     validado++;
        // }

        if ($("#MetrosCubicos").val() == 0) {
            $("#val_Metros").text("*");
            $("#val_Metros2").text("Debe Digitar la cantidad de Metros Cubicos");
            $("#val_Metros3").text("Debe Digitar la cantidad de Metros Cubicos");
        }else{
            $("#val_Metros").text("");
            $("#val_Metros2").text("");
            $("#val_Metros3").text("");
            validado++;
        }

        if ($("#ValorMetro").val() == 0) {
            $("#val_ValorMetro").text("*");
            $("#val_ValorMetro2").text("Debe digitar  el valor");
            $("#val_ValorMetro3").text("Debe digitar  el valor");
        }else{
            $("#val_ValorMetro").text("");
            $("#val_ValorMetro2").text("");
            $("#val_ValorMetro3").text("");
            validado++;
        }

        if ($("#AIU").val() == 0) {
            $("#val_AIU").text("*");
            $("#val_AIU2").text("Valor requerido");
        }else{
            $("#val_AIU").text("");
            $("#val_AIU2").text("");
            validado++;
        }

        if ($("#Subtotal").val() == 0) {
            $("#val_SubTotal").text("*");
            $("#val_SubTotal2").text("Valor requerido");
        }else{
            $("#val_SubTotal").text("");
            $("#val_SubTotal2").text("");
            validado++;
        }
        if ($("#IvaAIU").val() == 0) {
            $("#val_IvaAIU").text("*");
            $("#val_IvaAIU2").text("Valor requerido");
        }else{
            $("#val_IvaAIU").text("");
            $("#val_IvaAIU2").text("");
            validado++;
        }

        if ($("#ValorTotal").val() == 0) {
            $("#val_ValorTotal").text("*");
            $("#val_ValorTotal2").text("Valor requerido");
        }else{
            $("#val_ValorTotal").text("");
            $("#val_ValorTotal2").text("");
            validado++;
        }

        if (validado==15)
        {

                Swal.fire({
                    title:'Proceso exitoso.',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
                        });

            document.FrmCrearCotizacion.submit();
        }
        else{
            Swal.fire({
                title:'Error en el proceso.',text:'Campos pendientes por validar.',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
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

function traerObra()
{
    let id = $("#IdEmpresa").val();
    console.log(id);

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/cotizacion/pasarobra',
        type: 'POST',
        data:  {
            id: $('#IdEmpresa').val(),
        },
    }).done(function(res) {
        var arreglo = JSON.parse(res);

            // $("#IdObra").append(res.nombre);

            for (let index = 0; index < arreglo.length; index++) {
                console.log(arreglo[index].nombre)
                $('#IdObra').append(`<option value="${arreglo[index].id}">${arreglo[index].nombre}</option>`);
            }

    });
}





