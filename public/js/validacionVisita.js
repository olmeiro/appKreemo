var calendar = null;
$(function(){
    var calendarEl = document.getElementById('calendar');
   calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
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
      select: function(arg) {
        let fecha = moment(arg.start).format("YYYY-MM-DD")
        let horainicio = moment(arg.start).format("HH:mm:ss")
       
        $("#fecha").val(fecha);
        $("#horainicio").val(horainicio);
        $("#tiempo").val("30");
        $("#agenda_modal").modal();
        calendar.unselect()
      },

      editable: true,
      events:{
        url: 'visita/listar',
        method: 'GET',
        failure: function (){
            alert('No se ha encontrado la visita');
        }
      },
      
      eventClick: function(info) {

     
        console.log(info);
        console.log(info.event.start);
        console.log(info.event.end);
        console.log(info.event.id);
       

        let fecha = moment(info.event.start).format("YYYY-MM-DD");
        $("#fecha").val(fecha);

        let horaInicial = moment(info.event.start).format("HH:mm:ss");
        $("#horainicio").val(horaInicial);

        let horaFinal = moment(info.event.end).format("HH:mm:ss");
        $("#horafinal").val(horaFinal);
       
        $("#idobra").val(info.event.extendedProps.obra);
        $("#tipovisita").val(info.event.extendedProps.tipovisita);

        $("#tiempo").val("30");
     

         $("#agenda_modal1").modal('show');
      },

    });
      calendar.render();

})
function tiempofinal(){
  let fecha = $("#fecha").val();
  let  hora = $("#horainicio").val();
  let tiempo = $("#tiempo").val();
  let horafinal= moment(fecha + " "+hora).add(tiempo, 'm').format('HH:mm:ss');
  document.getElementById("horafinal").value=(horafinal);
}

function guardar(){
    var formulario = new FormData(document.getElementById("FrmAgenda"));
    let fecha = $("#fecha").val();
    let  hora = $("#horainicio").val();
    let tiempo = $("#tiempo").val();
    let horainicio =moment(fecha + " "+ hora).format('HH:mm:ss');
    let horafinal= moment(fecha + " "+hora).add(tiempo, 'm').format('HH:mm:ss');
  
    formulario.append("horainicio", horainicio);
    formulario.append("horafinal", horafinal);
  
    $.ajax({
      url: "/visita/guardar",
      type: "POST",
      data: formulario,
      processData: false,
      contentType: false
    }).done(function(respuesta){
      if(respuesta && respuesta.ok){
          calendar.refetchEvents();
          Swal.fire({
            title:'Registro exitoso',text:'Visita creada!!',icon:'success',footer:'<span class="validacion">Kreemo Solution Systems',
            padding:'1rem',
            backdrop:true,
            position:'center',
                });
          limpiar();
      } else {
        Swal.fire({
          title:'Error en la creación de la visita',text:'Ya hay una visita en en la fecha y hora seleccionada',icon:'error',footer:'<span class="validacion">Kreemo Solution Systems',
           padding:'1rem',
          backdrop:true,
          position:'center',
      });
      }
  
    })
  }

  
  function limpiar(){
    $("#agenda_modal").modal('hide');
    $("#fecha").val("");
    $("#horainicio").val("");
    $("#tiempo").val("");
    $("#idobra").val("0");
    $("#tipovisita").val("0");
}


$('#agenda_modal1').on('shown.bs.modal', function () {
  $("#calendar").calendar('render');
});