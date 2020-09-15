@extends('layouts.app')

@section('body')
    
        <div class="card col">

                <div id='calendar'>
                
                </div>
        </div>
        
    
    <div class="modal fade" id="agenda_modal" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">AGENDA DE CITAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="FrmAgenda">
      @csrf
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Fecha</label>
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
                        <input type="time" class="form-control" id="horafinal" readonly>
                    </div>
                </div>
          </div>
            <div class="row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="">Obra</label>
                        <select class="form-control"name= "idobra" id="idobra">
                        <option value="0">Seleccione una Obra</option>
                       @foreach($obra as $key =>$value)
                          <option value="{{ $value->id }}" {{(old('idobra')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
            </div>
            <div class="col-6">
                    <div class="form-group">
                        <label for="">Tipo de Visita</label>
                        <select class="form-control"id="tipovisita" name="tipovisita">
                        <option value="0">Seleccione</option>
                        <option value="Técnica">Técnica</option>
                        <option value="Comercial">Comercial</option>
                        </select>
                    </div>
            </div>
        </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button onclick="guardar()" type="button" class="btn btn-success">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section("style")
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.css")}}'rel='stylesheet'/>
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.min.css")}}'rel='stylesheet'/>
@endsection

@section("scripts")
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.min.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/locales/es.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/moment.min.js")}}'></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionVisita.js') }}"></script>

@endsection
