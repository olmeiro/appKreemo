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
                                    <input type="date" class="form-control" id="fechainicio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Fecha Fin</label>
                                    <input type="date" class="form-control" id="fechafin" name="fechafin">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Modelo</label>
                                    <select class="form-control"name= "idmaquina" id="idmaquina">
                                    <option value="0">Seleccione una maquina</option>
                                @foreach($maquinaria as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idmaquina')==$value->id)? 'selected':''}}>{{ $value->modelo}}</option>
                                @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Id Cotización</label>
                                    <select class="form-control"name= "idcotizacion" id="idcotizacion">
                                    <option value="0">Seleccione una Cotización</option>
                                @foreach($cotizacion as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idcotizacion')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 1</label>
                                    <select class="form-control"name= "idoperario1" id="idoperario1">
                                    <option value="0">Seleccione Operario</option>
                                @foreach($operario as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idoperario1')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 2</label>
                                    <select class="form-control"name= "idoperario2" id="idoperario2">
                                    <option value="0">Seleccione Operario</option>
                                @foreach($operario as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idoperario2')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Estado Servicio</label>
                                    <select class="form-control"name= "idestadoservicio" id="idestadoservicio">
                                    <option value="0">Seleccione un Estado</option>
                                @foreach($estadoservicio as $key =>$value)
                                    <option value="{{ $value->id }}" {{(old('idestadoservicio')==$value->id)? 'selected':''}}>{{ $value->estado}}</option>
                                    @endforeach
                                    </select>
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

