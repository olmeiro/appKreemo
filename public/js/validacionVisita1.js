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

        let fecha = moment(info.date).format("YYYY-MM-DD")
        let horainicio = moment(info.date).format("HH:mm:ss")
       
        $("#fecha").val(fecha);
        $("#horainicio").val(horainicio);
        $("#tiempo").val("30");

        $("#agenda_modal").modal();
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

        let fecha = moment(info.event.start).format("YYYY-MM-DD");
        $("#fecha").val(fecha);

        let horaInicial = moment(info.event.start).format("HH:mm:ss");
        $("#horainicio").val(horaInicial);

        let horaFinal = moment(info.event.end).format("HH:mm:ss");
        $("#horafinal").val(horaFinal);
       
        $("#idobra").val(info.event.extendedProps.obra);
        $("#tipovisita").val(info.event.extendedProps.tipovisita);

        $("#descripcion").val(info.event.extendedProps.descripcion);

        $("#tiempo").val("30");

        $("#agenda_modal").modal();
      },

    eventSources: [

        // your event source
        {
          url: '/visita/show.php', // use the `url` property
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
            tipovisita:  $("#tipovisita").val(),
            idobra:  $("#idobra").val(),
            fecha:  $("#fecha").val(),
            horainicio:  $("#horainicio").val(),
            horafinal:  $("#horafinal").val(),
            descripcion: $("#descripcion").val(), 
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method

        }

        return(nuevoEvento);
    }

    function EnviarInformacion(accion, objEvento){

        $.ajax(
        {
            type:"POST",
            url:'/visita'+accion,
            data: objEvento,
            success:function(msg){
                console.log(msg);

                $("#agenda_modal").modal('toggle');     
                calendar.refetchEvents();
            },
           
                error:function(){
                    alert("hay un error");}
                }
        );
    }    
})

function tiempofinal(){
  let fecha = $("#fecha").val();
  let  hora = $("#horainicio").val();
  let tiempo = $("#tiempo").val();
  let horafinal= moment(fecha + " "+hora).add(tiempo, 'm').format('HH:mm:ss');
  document.getElementById("horafinal").value=(horafinal);
}

  
  function limpiar(){
    //$("#agenda_modal").modal('hide');
    $("#fecha").val("");
    $("#horainicio").val("");
    $("#tiempo").val("");
    $("#idobra").val("0");
    $("#tipovisita").val("0");
    $("#id").val("0");
    $("#descripcion").val("");
}

