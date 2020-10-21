@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')

        <div class="card col">

                <div id='calendar'>

                </div>
        </div>

 <!-- Modal Crear Visita: -->

  <div class="modal fade" id="agenda_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Datos de la visita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
      <form id="FrmAgenda">
      @csrf
            <input type="hidden" id="id">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <label class="validacion" id="valfecha"></label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Tiempo (minutos)</label>
                        <input type="number" class="form-control" id="tiempo" onchange="tiempofinal()">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Hora inicial</label>
                        <input type="time" class="form-control" id="horainicio" onchange="tiempofinal()">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Hora final</label>
                        <label class="validacion" id="valhorafinal"></label>
                        <input type="time" class="form-control" id="horafinal" readonly>
                    </div>
                </div>
          </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Obra</label>
                        <label class="validacion" id="valobra"></label>
                        <select class="form-control"name= "idobra" id="idobra">
                        <option value="0">Seleccione</option>
                       @foreach($obra as $key =>$value)
                          <option value="{{ $value->id }}" {{(old('idobra')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
            </div>
            <div class="col-6">
                    <div class="form-group">
                        <label for="">Tipo de visita</label>
                        <label class="validacion" id="valtipovisita"></label>
                        <select class="form-control"id="tipovisita" name="tipovisita">
                        <option value="0">Seleccione</option>
                        <option value="Técnica">Técnica</option>
                        <option value="Comercial">Comercial</option>
                        </select>
                    </div>
            </div>
            <div class="col-6">
                <textarea name="descripcion" id="descripcion" cols="55" rows="3"></textarea>
            </div>
        </form>
            </div>
      </div>
      <div class="modal-footer">
        <button  id="btnAgregar" type="button" class="btn btn-success">Crear</button>
        <button  id="btnModificaa" type="button" class="btn btn-primary">Editar</button>
        <button  id="btnBorrar" type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>

@endsection
@section("style")

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.css")}}'rel='stylesheet'/>
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.min.css")}}'rel='stylesheet'/>
<link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection

@section("scripts")
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#fecha", {
        minDate: "today",
        maxDate: "",
        locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      },

    });
</script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.min.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/locales/es.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/moment.min.js")}}'></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionVisita1.js') }}"></script>

@endsection
