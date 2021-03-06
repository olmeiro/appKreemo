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
    letras = "0123456789",
    especiales = [],
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
            $("#val_empresa2").text("Debe ingresar la empresa");
        }else{
            $("#val_empresa").text("");
            $("#val_empresa2").text("");
            validado++;
        }

        if ($("#IdEstado").val() == 0) {
            $("#val_Estado").text("*");
            $("#val_Estado2").text("Debe seleccionar un estado");
        }else{
            $("#val_Estado").text("");
            $("#val_Estado2").text("");
            validado++;
        }

        if ($("#IdModalidad").val() == 0) {
            $("#val_Modalidad").text("*");
            $("#val_Modalidad2").text("Debe seleccionar una modalidad");
        }else{
            $("#val_Modalidad").text("");
            $("#val_Modalidad2").text("");
            validado++;
        }

        if ($("#IdEtapa").val() == 0) {
            $("#val_Etapa").text("*");
            $("#val_Etapa2").text("Debe seleccionar una etapa");
        }else{
            $("#val_Etapa").text("");
            $("#val_Etapa2").text("");
            validado++;
        }

        if ($("#IdJornada").val() == 0) {
            $("#val_Jornada").text("*");
            $("#val_Jornada2").text("Debe seleccionar una jornada");
        }else{
            $("#val_Jornada").text("");
            $("#val_Jornada2").text("");
            validado++;
        }

        if ($("#IdTipo_Concreto").val() == 0) {
            $("#val_TipoConcreto").text("*");
            $("#val_TipoConcreto2").text("Debe seleccionar un tipo de concreto");
        }else{
            $("#val_TipoConcreto").text("");
            $("#val_TipoConcreto2").text("");
            validado++;
        }

        if ($("#IdObra").val() == 0) {
            $("#val_Obra").text("*");
            $("#val_Obra2").text("Debe seleccionar una obra");
        }else{
            $("#val_Obra").text("");
            $("#val_Obra2").text("");
            validado++;
        }

        if ($("#Ciudad").val().length > 30) {
            $("#val_ciudad").text("*");
            $("#val_ciudad2").text("Nombre con maximo 30 caracteres");
        }else{
            $("#val_ciudad").text("");
            $("#val_ciudad2").text("");
            validado++;
        }



        if ($("#FechaCotizacion").val().length == 0) {
            $("#val_FechaCotizacion").text("*");
            $("#val_FechaCotizacion2").text("Debe seleccionar una fecha");
        }else{
            $("#val_FechaCotizacion").text("");
            $("#val_FechaCotizacion2").text("");
            validado++;
        }

        if ($("#InicioBombeo").val().length == 0) {
            $("#val_FechaInicio").text("*");
            $("#val_FechaInicio2").text("Debe seleccionar una fecha");
        }else{
            $("#val_FechaInicio").text("");
            $("#val_FechaInicio2").text("");
            validado++;
        }

        if ($("#Losas").val().length > 2) {
            $("#val_Losas").text("*");
            $("#val_Losas2").text("Las losas no deben ser superiores a 99.");
        }else{
            $("#val_Losas").text("");
            $("#val_Losas2").text("");
            validado++;
        }

        if ($("#Tuberia").val().length > 3) {
            $("#val_Tuberia").text("*");
            $("#val_Tuberia2").text("La tuberia no debe superar los 999 mts");
        }else{
            $("#val_Tuberia").text("");
            $("#val_Tuberia2").text("");
            validado++;
        }

        if ($("#MetrosCubicos").val() == 0) {
            $("#val_Metros").text("*");
            $("#val_Metros2").text("Debe digitar la cantidad de metros cubicos");
        }else if($("#MetrosCubicos").val().length > 3){
            $("#val_Metros").text("*");
            $("#val_Metros2").text("Los metros no deben superr los 999 mts");
        }else{
            $("#val_Metros").text("");
            $("#val_Metros2").text("");
            validado++;
        }

        if ($("#ValorMetro").val() == 0) {
            $("#val_ValorMetro").text("*");
            $("#val_ValorMetro2").text("Debe digitar  el valor");
        }else if($("#ValorMetro").val().length > 6){
            $("#val_ValorMetro").text("*");
            $("#val_ValorMetro2").text("El valor del mt no debe ser mayor de 40000");
        }else{
            $("#val_ValorMetro").text("");
            $("#val_ValorMetro2").text("");
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

        if ($("#ValorTransporte").val().length > 8) {
            $("#val_Valtrans").text("*");
            $("#val_Valtrans2").text("El valor del transporte no debe superar los 99.999.999");
        }else{
            $("#val_Valtrans").text("");
            $("#val_Valtrans2").text("");
            validado++;
        }

        if (validado==19)
        {

                Swal.fire({
                    title:'Proceso exitoso.',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    padding:'1rem',
                    backdrop:true,
                    position:'center',
                });

            document.FrmCrearCotizacion.submit();
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

            for (let index = 0; index < arreglo.length; index++) {
                console.log(arreglo[index].nombre)
                $('#IdObra').append(`<option value="${arreglo[index].id}">${arreglo[index].nombre}</option>`);
            }
    });
}
