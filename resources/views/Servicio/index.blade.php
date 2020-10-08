@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')

<div class="card col">
    <div id='calendar'>
    </div>
</div>

<div class="modal fade" id="agendaservicio_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmAgendaServicio">
                @csrf
                    <input type="hidden" id="id">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Fecha de inicio</label>
                                    <label class="validacion" id="valfecha"></label>
                                    <input type="date" class="form-control @error('fechainicio') is-invalid @enderror" id="fechainicio">
                                    <label class="validacion" id="valfecha2"></label>
                                    @error('fechainicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">

                                    <label for="">Hora Inicial</label>
                                    <input type="time" class="form-control" id="horainicio">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Fecha Fin</label>
                                    <label class="validacion" id="valfechafin"></label>
                                    <input type="date" class="form-control @error('fechafin') is-invalid @enderror" id="fechafin" name="fechafin">
                                    <label class="validacion" id="valfechafin2"></label>
                                    @error('fechafin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hora Final</label>
                                    <input type="time" class="form-control" id="horafin">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Máquina</label>
                                    <label class="validacion" id="validmaquina"></label>
                                    <select class="form-control @error('idmaquina') is-invalid @enderror" name= "idmaquina" id="idmaquina">
                                    <option value="0">Seleccione</option>
                                    @foreach($maquinaria as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('idmaquina')==$value->id)? 'selected':''}}>{{ $value->modelo}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validmaquina2"></label>
                                    @error('idmaquina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">N° Cotización</label>
                                    <label class="validacion" id="validcotizacion"></label>
                                    <select class="form-control @error('idcotizacion') is-invalid @enderror" name= "idcotizacion" id="idcotizacion">
                                    <option value="0">Seleccione</option>
                                    @foreach($cotizacion as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('idcotizacion')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validcotizacion2"></label>
                                    @error('idcotizacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 1</label>
                                    <label class="validacion" id="validoperario1"></label>
                                    <select class="form-control @error('idoperario1') is-invalid @enderror" name= "idoperario1" id="idoperario1">
                                    <option value="0">Seleccione Operario</option>
                                    @foreach($operario as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('idoperario1')==$value->id)? 'selected':''}}>{{ $value->nombre}} {{ $value->apellido}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validoperario12"></label>
                                    @error('idoperario1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 2</label>
                                    <label class="validacion" id="validoperario2"></label>
                                    <select class="form-control @error('idoperario2') is-invalid @enderror" name= "idoperario2" id="idoperario2">
                                    <option value="0">Seleccione Operario</option>
                                    @foreach($operario as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('idoperario2')==$value->id)? 'selected':''}}>{{ $value->nombre}} {{ $value->apellido}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validoperario22"></label>
                                    @error('idoperario2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Estado del servicio</label>
                                    <label class="validacion" id="validestadoservicio"></label>
                                    <select class="form-control @error('idestadoservicio') is-invalid @enderror" name= "idestadoservicio" id="idestadoservicio">
                                    <option value="0">Seleccione</option>
                                    @foreach($estadoservicio as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('idestadoservicio')==$value->id)? 'selected':''}}>{{ $value->estado}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validestadoservicio2"></label>
                                    @error('idestadoservicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <label class="validacion" id="valdescripcion"></label>
                                    <textarea name="descripcion" id="descripcion" cols="25" rows="3"></textarea>
                                    <label class="validacion" id="valdescripcion2"></label>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button  id="btnAgregar" type="button" class="btn btn-success">Crear</button>
                <button  id="btnModificaa" type="button" class="btn btn-warning">Editar</button>
                <button  id="btnBorrar" type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" id="btnCancelar" class="btn btn-default" data-dismiss="modal" onclick="limpiar()">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section("style")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.css")}}'rel='stylesheet'/>
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.min.css")}}'rel='stylesheet'/>
<link href="{{ asset('css/styleMaquiOperario.css') }}" rel="stylesheet">
@endsection

@section("scripts")
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#fechainicio", {
        minDate: "today",
        maxDate: ""
    });

    flatpickr("#fechafin", {
        minDate: "today",
        maxDate: ""
    });
</script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.min.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/locales/es.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/moment.min.js")}}'></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionServicio.js') }}"></script>
@endsection

