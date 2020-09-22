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
};
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
};

$(document).ready(function() {
    $("#FrmCrearListaChequeo").submit(function(event){
        event.preventDefault();

        let validado=0;

        if ($("#idvisita").val() == 0) {
            $("#val_idvisita").text("*");
            $("#val_idvisita2").text("Debe seleccionar una visita");
        }else{
            $("#val_idvisita").text("");
            $("#val_idvisita2").text("");
            validado++;
        }

        if ($("#numeroplanilla").val().length == 0) {
            $("#val_numeroplanilla").text("*");
            $("#val_numeroplanilla2").text("Debe ingresar el número de planilla");
        }else{
            $("#val_numeroplanilla").text("");
            $("#val_numeroplanilla2").text("");
            validado++;
        }

        if ($("#estadovia").val() == 'NS') {
            $("#val_estadovia").text("*");
            $("#val_estadovia2").text("Debe seleccionar una opción");
        }else{
            $("#val_estadovia").text("");
            $("#val_estadovia2").text("");
            validado++;
        }

        if ($("#ph").val() == 'NS') {
            $("#val_ph").text("*");
            $("#val_ph2").text("Debe seleccionar una opción");
        }else{
            $("#val_ph").text("");
            $("#val_ph2").text("");
            validado++;
        }

        if ($("#hueco").val() == 'NS') {
            $("#val_hueco").text("*");
            $("#val_hueco2").text("Debe seleccionar una opción");
        }else{
            $("#val_hueco").text("");
            $("#val_hueco2").text("");
            validado++;
        }

        if ($("#techo").val() == 'NS') {
            $("#val_techo").text("*");
            $("#val_techo2").text("Debe seleccionar una opción");
        }else{
            $("#val_techo").text("");
            $("#val_techo2").text("");
            validado++;
        }
        if ($("#desarenadero").val() == 'NS') {
            $("#val_desarenadero").text("*");
            $("#val_desarenadero2").text("Debe seleccionar una opción");
        }else{
            $("#val_desarenadero").text("");
            $("#val_desarenadero2").text("");
            validado++;
        }
        if ($("#desague").val() == 'NS') {
            $("#val_desague").text("*");
            $("#val_desague2").text("Debe seleccionar una opción");
        }else{
            $("#val_desague").text("");
            $("#val_desague2").text("");
            validado++;
        }

        if ($("#agua").val() == 'NS') {
            $("#val_agua").text("*");
            $("#val_agua2").text("Debe seleccionar una opción");
        }else{
            $("#val_agua").text("");
            $("#val_agua2").text("");
            validado++;
        }

        if ($("#lineaelectrica").val() == 'NS') {
            $("#val_lineaelectrica").text("*");
            $("#val_lineaelectrica2").text("Debe seleccionar una opción");
        }else{
            $("#val_lineaelectrica").text("");
            $("#val_lineaelectrica2").text("");
            validado++;
        }

        if ($("#senializacion").val() == 'NS') {
            $("#val_senializacion").text("*");
            $("#val_senializacion2").text("Debe seleccionar una opción");
        }else{
            $("#val_senializacion").text("");
            $("#val_senializacion2").text("");
            validado++;
        }

        if ($("#iluminacion").val() == 'NS') {
            $("#val_iluminacion").text("*");
            $("#val_iluminacion2").text("Debe seleccionar una opción");
        }else{
            $("#val_iluminacion").text("");
            $("#val_iluminacion2").text("");
            validado++;
        }

        if ($("#banios").val() == 'NS') {
            $("#val_banios").text("*");
            $("#val_banios2").text("Debe seleccionar una opción");
        }else{
            $("#val_banios").text("");
            $("#val_banios2").text("");
            validado++;
        }

        if ($("#condicioninsegura").val() == 'NS') {
            $("#val_condicioninsegura").text("*");
            $("#val_condicioninsegura2").text("Debe seleccionar una opción");
        }else{
            $("#val_condicioninsegura").text("");
            $("#val_condicioninsegura").text("");
            validado++;
        }
        if ($("#ordenpublico").val() == 'NS') {
            $("#val_ordenpublico").text("*");
            $("#val_ordenpublico2").text("Debe seleccionar una opción");
        }else{
            $("#val_ordenpublicoo").text("");
            $("#val_ordenpublico2").text("");
            validado++;
        }
        if ($("#vigilancia").val() == 'NS') {
            $("#val_vigilancia").text("*");
            $("#val_vigilancia2").text("Debe seleccionar una opción");
        }else{
            $("#val_vigilancia").text("");
            $("#val_vigilancia2").text("");
            validado++;
        }

        if ($("#caspete").val() == 'NS') {
            $("#val_caspete").text("*");
            $("#val_caspete2").text("Debe seleccionar una opción");
        }else{
            $("#val_caspete").text("");
            $("#val_caspete2").text("");
            validado++;
        }

        if ($("#infoSST").val() == 'NS') {
            $("#val_infoSST").text("*");
            $("#val_infoSST2").text("Debe seleccionar una opción");
        }else{
            $("#val_infoSST").text("");
            $("#val_infoSST2").text("");
            validado++;
        }

        if ($("#politicashoras").val() == 'NS') {
            $("#val_politicashoras").text("*");
            $("#val_politicashoras2").text("Debe seleccionar una opción");
        }else{
            $("#val_politicashoras").text("");
            $("#val_politicashoras2").text("");
            validado++;
        }

        if ($("#encargadovisita").val() == 0) {
            $("#val_encargadovisita").text("*");
            $("#val_encargadovisita2").text("Debe ingresar el encargado");
        }else{
            $("#val_encargadovisita").text("");
            $("#val_encargadovisita2").text("");
            validado++;
        }
        if ($("#viabilidad").val() == 'NS') {
            $("#val_viabilidad").text("*");
            $("#val_viabilidad2").text("Debe seleccionar una opción");
        }else{
            $("#val_viabilidad").text("");
            $("#val_viabilidad2").text("");
            validado++;
        }


        if (validado==21)
        {
            Swal.fire({
                title:'Registro exitoso',text:'Lista de chequeo creada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });

            document.FrmCrearListaChequeo.submit();
        }
        else{
            Swal.fire({
                title:'Error en la creación',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
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


$(document).ready(function() {
    $("#FrmEditarListaChequeo").submit(function(event){
        event.preventDefault();

        let validado=0;

        if ($("#idvisita").val() == 0) {
            $("#val_idvisita").text("*");
            $("#val_idvisita2").text("Debe seleccionar una visita");
        }else{
            $("#val_idvisita").text("");
            $("#val_idvisita2").text("");
            validado++;
        }

        if ($("#numeroplanilla").val() == 0) {
            $("#val_numeroplanilla").text("*");
            $("#val_numeroplanilla2").text("Debe ingresar el número de planilla");
        }else{
            $("#val_numeroplanilla").text("");
            $("#val_numeroplanilla2").text("");
            validado++;
        }

        if ($("#estadovia").val() == 'NS') {
            $("#val_estadovia").text("*");
            $("#val_estadovia2").text("Debe seleccionar una opción");
        }else{
            $("#val_estadovia").text("");
            $("#val_estadovia2").text("");
            validado++;
        }

        if ($("#ph").val() == 'NS') {
            $("#val_ph").text("*");
            $("#val_ph2").text("Debe seleccionar una opción");
        }else{
            $("#val_ph").text("");
            $("#val_ph2").text("");
            validado++;
        }

        if ($("#hueco").val() == 'NS') {
            $("#val_hueco").text("*");
            $("#val_hueco2").text("Debe seleccionar una opción");
        }else{
            $("#val_hueco").text("");
            $("#val_hueco2").text("");
            validado++;
        }

        if ($("#techo").val() == 'NS') {
            $("#val_techo").text("*");
            $("#val_techo2").text("Debe seleccionar una opción");
        }else{
            $("#val_techo").text("");
            $("#val_techo2").text("");
            validado++;
        }
        if ($("#desarenadero").val() == 'NS') {
            $("#val_desarenadero").text("*");
            $("#val_desarenadero2").text("Debe seleccionar una opción");
        }else{
            $("#val_desarenadero").text("");
            $("#val_desarenadero2").text("");
            validado++;
        }
        if ($("#desague").val() == 'NS') {
            $("#val_desague").text("*");
            $("#val_desague2").text("Debe seleccionar una opción");
        }else{
            $("#val_desague").text("");
            $("#val_desague2").text("");
            validado++;
        }

        if ($("#agua").val() == 'NS') {
            $("#val_agua").text("*");
            $("#val_agua2").text("Debe seleccionar una opción");
        }else{
            $("#val_agua").text("");
            $("#val_agua2").text("");
            validado++;
        }

        if ($("#lineaelectrica").val() == 'NS') {
            $("#val_lineaelectrica").text("*");
            $("#val_lineaelectrica2").text("Debe seleccionar una opción");
        }else{
            $("#val_lineaelectrica").text("");
            $("#val_lineaelectrica2").text("");
            validado++;
        }

        if ($("#senializacion").val() == 'NS') {
            $("#val_senializacion").text("*");
            $("#val_senializacion2").text("Debe seleccionar una opción");
        }else{
            $("#val_senializacion").text("");
            $("#val_senializacion2").text("");
            validado++;
        }

        if ($("#iluminacion").val() == 'NS') {
            $("#val_iluminacion").text("*");
            $("#val_iluminacion2").text("Debe seleccionar una opción");
        }else{
            $("#val_iluminacion").text("");
            $("#val_iluminacioneco2").text("");
            validado++;
        }

        if ($("#banios").val() == 'NS') {
            $("#val_banios").text("*");
            $("#val_banios2").text("Debe seleccionar una opción");
        }else{
            $("#val_banios").text("");
            $("#val_banios2").text("");
            validado++;
        }

        if ($("#condicioninsegura").val() == 'NS') {
            $("#val_condicioninsegura").text("*");
            $("#val_condicioninsegura2").text("Debe seleccionar una opción");
        }else{
            $("#val_condicioninsegura").text("");
            $("#val_condicioninsegura").text("");
            validado++;
        }
        if ($("#ordenpublico").val() == 'NS') {
            $("#val_ordenpublico").text("*");
            $("#val_ordenpublico2").text("Debe seleccionar una opción");
        }else{
            $("#val_ordenpublicoo").text("");
            $("#val_ordenpublico2").text("");
            validado++;
        }
        if ($("#vigilancia").val() == 'NS') {
            $("#val_vigilancia").text("*");
            $("#val_vigilancia2").text("Debe seleccionar una opción");
        }else{
            $("#val_vigilancia").text("");
            $("#val_vigilancia2").text("");
            validado++;
        }

        if ($("#caspete").val() == 'NS') {
            $("#val_caspete").text("*");
            $("#val_caspete2").text("Debe seleccionar una opción");
        }else{
            $("#val_caspete").text("");
            $("#val_caspete2").text("");
            validado++;
        }

        if ($("#infoSST").val() == 'NS') {
            $("#val_infoSST").text("*");
            $("#val_infoSST2").text("Debe seleccionar una opción");
        }else{
            $("#val_infoSST").text("");
            $("#val_infoSST2").text("");
            validado++;
        }

        if ($("#politicashoras").val() == 'NS') {
            $("#val_politicashoras").text("*");
            $("#val_politicashoras2").text("Debe seleccionar una opción");
        }else{
            $("#val_politicashoras").text("");
            $("#val_politicashoras2").text("");
            validado++;
        }

        if ($("#encargadovisita").val() == 0) {
            $("#val_encargadovisita").text("*");
            $("#val_encargadovisita2").text("Debe ingresar el encargado");
        }else{
            $("#val_encargadovisita").text("");
            $("#val_encargadovisita2").text("");
            validado++;
        }
        if ($("#viabilidad").val() == 'NS') {
            $("#val_viabilidad").text("*");
            $("#val_viabilidad2").text("Debe seleccionar una opción");
        }else{
            $("#val_viabilidad").text("");
            $("#val_viabilidad2").text("");
            validado++;
        }


        if (validado==21)
        {
            Swal.fire({
                title:'Moficiación exitosa',text:'Lista de Chequeo modificada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                   //width: '50%',
                padding:'1rem',
                   //background:'#000',
                backdrop:true,
                   //toast: true,
                position:'center',
                    });
                
            document.EditarListaChequeo.submit();
          
        }
        else{
            Swal.fire({
                title:'Error en la modificación',text:'Campos pendientes por validar',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
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