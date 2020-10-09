var calendar = null;
$(function(){
    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
      headerToolbar: {
        left: 'prev,next today Miboton',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      customButtons:{
        Miboton:{
            text:"Estados Servicio",
            click:function(){
                window.location.href = "/estadoservicio";
            }
        },

      },
      slotLabelFormat:{
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
        },//se visualizara de esta manera 01:00 AM en la columna de horas
      eventTimeFormat: {
          hour: '2-digit',
          minute: '2-digit',
          hour12: true
         },

      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      dateClick: function(info) {

        var check = moment(info.date).format("YYYY-MM-DD");
        var today = moment(new Date()).format("YYYY-MM-DD");
        if(check < today)
        {
            alert("No puedes agendar aquí");
        }
        else
        {
            let fechainicio = moment(info.date).format("YYYY-MM-DD");
            let fechafin = moment(info.date).format("YYYY-MM-DD");
            let horainicio = moment(info.date).format("HH:mm:ss");
            let horafin = moment(info.date).format("HH:mm:ss");
            $("#fechainicio").val(fechainicio);
            $("#fechafin").val(fechafin);
            $("#horainicio").val(horainicio);
            $("#horafin").val(horafin);

            $("#agendaservicio_modal").modal();
            calendar.unselect();
        }


      },

      eventClick: function(info) {

        //alert("hola soy modal");
        console.log(info);
        console.log(info.event.id);
        console.log(info.event.start);
        console.log(info.event.end);

        let id = info.event.id;
        $("#id").val(id);

        let fechainicio = moment(info.event.start).format("YYYY-MM-DD");
        $("#fechainicio").val(fechainicio);

        let fechafin = moment(info.event.end).format("YYYY-MM-DD");
        $("#fechafin").val(fechafin);

        let horainicio = moment(info.event.start).format("HH:mm:ss");
        $("#horainicio").val(horainicio);

        let horafin = moment(info.event.end).format("HH:mm:ss");
        $("#horafin").val(horafin);

        $("#idcotizacion").val(info.event.extendedProps.cotizacion);

        $("#idmaquina").val(info.event.extendedProps.maquina);

        $("#idestadoservicio").val(info.event.extendedProps.estadoservicio);

         $("#idoperario1").val(info.event.extendedProps.operario1);

        $("#idoperario2").val(info.event.extendedProps.operario2);

        $("#descripcion").val(info.event.extendedProps.descripcion);

         $("#agendaservicio_modal").modal();
      },

    eventSources: [

        // your event source
        {
          url: '/servicio/show', // use the `url` property
          color: 'yellow',    // an option!
        }

        // any other sources...

      ]


    }),

    calendar.render();

    $("#btnAgregar").click(function(){
        ObjEvento=recolectarDatosGUI("POST");
        //console.log(ObjEvento);

        EnviarInformacion('',ObjEvento);
    });

    $("#btnBorrar").click(function(){
        ObjEvento=recolectarDatosGUI("DELETE");
        //console.log(ObjEvento);
        EnviarInformacion('/'+$("#id").val(),ObjEvento);
    });

    $("#btnModificaa").click(function(){
        ObjEvento=recolectarDatosGUI("PATCH");

        EnviarInformacion('/'+$("#id").val(),ObjEvento);
    });

    function recolectarDatosGUI(method){
        nuevoEvento = {
            id: $("#id").val(),
            idestadoservicio:  $("#idestadoservicio").val(),
            idcotizacion:  $("#idcotizacion").val(),
            idmaquina:  $("#idmaquina").val(),
            idoperario1:  $("#idoperario1").val(),
            idoperario2:  $("#idoperario2").val(),
            fechainicio:  $("#fechainicio").val(),
            fechafin:  $("#fechafin").val(),
            horainicio:  $("#horainicio").val(),
            horafin:  $("#horafin").val(),
            descripcion: $("#descripcion").val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method

        }

        return(nuevoEvento);
    }


    function EnviarInformacion(accion, objEvento){
        let validado = 0;
        var fecha = new Date();
        var fechainicio = new Date ($("#fechainicio").val());
        var fechafin = new Date ($("#fechafin").val());

        if ($("#fechainicio").val().length == 0 ){
            $("#valfecha").text("*");
            $("#valfecha2").text("Elija una Fecha");
        }else if(fecha > fechainicio){
            $("#valfecha").text("*");
            $("#valfecha2").text("La fecha de inicio debe ser mayor a la fecha actual");
        }else{
            $("#valfecha").text("");
            $("#valfecha2").text("");
            validado++;
        }

        if( $("#fechafin").val().length == 0 ){
            $("#valfechafin").text("*");
            $("#valfechafin2").text("Debe elegir una fecha fin");
        }else if(fechainicio > fechafin){
            $("#valfechafin").text("*");
            $("#valfechafin2").text("La fecha fin debe ser mayor a la fecha inicio");
        }else{
            $("#valfechafin").text("");
            $("#valfechafin2").text("");
            validado++;
        }

        if( $("#idmaquina").val() == 0 ){
            $("#validmaquina").text("*");
            $("#validmaquina2").text("Debe elegir un modelo");
        }else{
            $("#validmaquina").text("");
            $("#validmaquina2").text("");
            validado++;
        }

        if( $("#idcotizacion").val() == 0 ){
            $("#validcotizacion").text("*");
            $("#validcotizacion2").text("Debe elegir una cotización");
        }else{
            $("#validcotizacion").text("");
            $("#validcotizacion2").text("");
            validado++;
        }

        if( $("#idoperario1").val() == 0 ){
            $("#validoperario1").text("*");
            $("#validoperario12").text("Debe elegir un operario");
        }else{
            $("#validoperario1").text("");
            $("#validoperario12").text("");
            validado++;
        }

        if( $("#idoperario2").val() == 0 ){
            $("#validoperario2").text("*");
            $("#validoperario22").text("Debe elegir un operario");
        }else if($("#idoperario2").val() == $("#idoperario1").val()){
            $("#validoperario2").text("*");
            $("#validoperario22").text("no puede ser el mismo operario");
        }else{
            $("#validoperario2").text("");
            $("#validoperario22").text("");
            validado++;
        }

        if( $("#idestadoservicio").val() == 0 ){
            $("#validestadoservicio").text("*");
            $("#validestadoservicio2").text("Debe elegir un estado");
        }else{
            $("#validestadoservicio").text("");
            $("#validestadoservicio2").text("");
            validado++;
        }

        if( $("#descripcion").val() == 0 ){
            $("#valdescripcion").text("*");
            $("#valdescripcion2").text("No puede dejar la descripción vacía");
        }else{
            $("#valdescripcion").text("");
            $("#valdescripcion2").text("");
            validado++;
        }
        if(validado ==8){

            $.ajax(
            {
                type:"POST",
                url:'/servicio'+accion,
                data: objEvento,
                success:function(msg){
                    console.log(msg);}}),
                    $("#agendaservicio_modal").modal('toggle');
                    calendar.refetchEvents();
            Swal.fire({
                title:'Registro exitoso',text:'Servicio Guardado!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
                    //width: '50%',
                padding:'1rem',
                    //background:'#000',
                backdrop:true,
                    //toast: true,
                position:'center',
                    });
                    calendar.refetchEvents();
                    $("#valfecha").text("");
                    $("#valfecha2").text("");
                    $("#valfechafin").text("");
                    $("#valfechafin2").text("");
                    $("#validestadoservicio").text("");
                    $("#validestadoservicio2").text("");
                    $("#validcotizacion").text("");
                    $("#validcotizacion2").text("");
                    $("#validmaquina").text("");
                    $("#validmaquina2").text("");
                    $("#validoperario1").text("");
                    $("#validoperario12").text("");
                    $("#validoperario2").text("");
                    $("#validoperario22").text("");
                    $("#id").val("");
                    $("#valdescripcion").val("");
                    $("input").val("");
                    $("select").val("0");
                    $("textarea").val("");
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
              validado = 0;}
    }
})

  function limpiar(){
    $("#valfecha").text("");
    $("#valfecha2").text("");
    $("#valfechafin").text("");
    $("#valfechafin2").text("");
    $("#validestadoservicio").text("");
    $("#validestadoservicio2").text("");
    $("#validcotizacion").text("");
    $("#validcotizacion2").text("");
    $("#validmaquina").text("");
    $("#validmaquina2").text("");
    $("#validoperario1").text("");
    $("#validoperario12").text("");
    $("#validoperario2").text("");
    $("#validoperario22").text("");
    $("#id").val("");
    $("#valdescripcion").val("");
    $("input").val("");
    $("select").val("0");
    $("textarea").val("");
}

