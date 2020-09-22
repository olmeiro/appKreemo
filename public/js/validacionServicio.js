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
            text:"Botón",
            click:function(){
                alert("hola mundo!");
            }
        }
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

        let fechainicio = moment(info.date).format("YYYY-MM-DD")
        let fechafin = moment(info.date).format("YYYY:MM:DD")

        $("#fechainicio").val(fechainicio);
        $("#fechafin").val(fechafin);
        //$("#tiempo").val("30");

        $("#agendaservicio_modal").modal();
        calendar.unselect();

        //calendar.addEvent({ title:"Evento x" , date:info.dateStr});
        // console.log("fecha:"+fecha);
        // console.log("horainicio:"+horainicio);

      },

      eventClick: function(info) {

        console.log(info);
        console.log(info.event.start);
        console.log(info.event.end);
        console.log(info.event.id);

        let id = info.event.id;
        $("#id").val(id);

        let fechainicio = moment(info.event.start).format("YYYY-MM-DD");
        $("#fechainicio").val(fechainicio);

        let fechafin = moment(info.event.end).format("YYYY-MM-DD");
        $("#fechafin").val(fechafin);

        $("#idmaquina").val(info.event.extendedProps.maquinaria);

        $("#idcotizacion").val(info.event.extendedProps.cotizacion);

        $("#idestadoservicio").val(info.event.extendedProps.estadoservicio);

        $("#operario1").val(info.event.extendedProps.operario);

        $("#operario2").val(info.event.extendedProps.operario);

        $("#descripcion").val(info.event.extendedProps.descripcion);

        //$("#tiempo").val("30");

        $("#agendasevicio_modal").modal();
      },

    eventSources: [

        // your event source
        {
          url: '/servicio/show.php', // use the `url` property
          color: 'yellow',    // an option!
          textColor: 'black'  // an option!
        }

        // any other sources...

      ]


    }),

    calendar.render();

    $("#btnAgregar").click(function(){
        ObjEvento=recolectarDatosGUI("POST");

        EnviarInformacion('',ObjEvento);
    });

    $("#btnBorrar").click(function(){
        ObjEvento=recolectarDatosGUI("DELETE");

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
            descripcion: $("#descripcion").val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method

        }

        return(nuevoEvento);
    }

    function EnviarInformacion(accion, objEvento){
        //alert("llega");
        $.ajax(
        {
            type:"POST",
            url:'/servicio'+accion,
            data: objEvento,
            success:function(msg){
                console.log(msg);

                $("#agendaservicio_modal").modal('toggle');
                calendar.refetchEvents();
            },
                error:function(){
                    alert("hay un error");}
        }
        );
    }
})


  function limpiar(){
    //$("#agenda_modal").modal('hide');
    $("#fechainicio").val("");
    $("#fechafin").val("");
    //$("#tiempo").val("");
    $("#idestadoservicio").val("0");
    $("#idcotizacion").val("0");
    $("#idmaquina").val("0");
    $("#idoperario1").val("0");
    $("#idoperario2").val("0");
    $("#id").val("0");
    $("#descripcion").val("");
}
