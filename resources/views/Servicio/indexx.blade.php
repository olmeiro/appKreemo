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
                <h5 class="modal-title">Datos del Servicio</h5>
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
                                    <label for="">Fecha Inicio</label>
                                    <label class="validacion" id="valfecha"></label>
                                    <input type="date" class="form-control calendarioI" id="fechainicio">
                                    <label class="validacion" id="valfecha2"></label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Fecha Fin</label>
                                    <label class="validacion" id="valfechafin"></label>
                                    <input type="date" class="form-control calendarioF" id="fechafin" name="fechafin">
                                    <label class="validacion" id="valfechafin2"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Modelo</label>
                                    <label class="validacion" id="validmaquina"></label>
                                    <select class="form-control"name= "idmaquina" id="idmaquina">
                                    <option value="0">Seleccione una maquina</option>
                                @foreach($maquinaria as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idmaquina')==$value->id)? 'selected':''}}>{{ $value->modelo}}</option>
                                @endforeach
                                    </select>
                                    <label class="validacion" id="validmaquina2"></label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Id Cotización</label>
                                    <label class="validacion" id="validcotizacion"></label>
                                    <select class="form-control"name= "idcotizacion" id="idcotizacion">
                                    <option value="0">Seleccione una Cotización</option>
                                @foreach($cotizacion as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idcotizacion')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                @endforeach
                                    </select>
                                    <label class="validacion" id="validcotizacion2"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 1</label>
                                    <label class="validacion" id="validoperario1"></label>
                                    <select class="form-control"name= "idoperario1" id="idoperario1">
                                    <option value="0">Seleccione Operario</option>
                                @foreach($operario as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idoperario1')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validoperario12"></label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 2</label>
                                    <label class="validacion" id="validoperario2"></label>
                                    <select class="form-control"name= "idoperario2" id="idoperario2">
                                    <option value="0">Seleccione Operario</option>
                                @foreach($operario as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idoperario2')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validoperario22"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Estado Servicio</label>
                                    <label class="validacion" id="validestadoservicio"></label>
                                    <select class="form-control"name= "idestadoservicio" id="idestadoservicio">
                                    <option value="0">Seleccione un Estado</option>
                                @foreach($estadoservicio as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idestadoservicio')==$value->id)? 'selected':''}}>{{ $value->estado}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validestadoservicio2"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button  id="btnAgregar" type="button" class="btn btn-success">Agregar</button>
                <button  id="btnModificaa" type="button" class="btn btn-warning">Modificar</button>
                <button  id="btnBorrar" type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" id="btnCancelar" class="btn btn-default" data-dismiss="modal" onclick="limpiar()">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section("style")
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.css")}}'rel='stylesheet'/>
<link href='{{ asset("assets/dashboard/assets/fullcalendar/main.min.css")}}'rel='stylesheet'/>
<link href="{{ asset('css/styleMaquiOperario.css') }}" rel="stylesheet">
@endsection

@section("scripts")
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/main.min.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/locales/es.js")}}'></script>
<script src='{{ asset("assets/dashboard/assets/fullcalendar/moment.min.js")}}'></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionServicio.js') }}"></script>
@endsection

