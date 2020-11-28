@extends('layouts.app')
@section('body')
<div class="container justify-content-center col-md-8">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Lista de chequeo</strong>
        </div>
        <div class="card-body table-responsive">
                @include('flash::message')
            <table id="tbl_listachequeo" class="table table-striped table-bordered " style="width: 100%;">
                <thead align="center">
                <tr>
                    <th>N° visita</th>
                    <th>Número planilla</th>
                    <th>Encargado visita</th>
                    <th>Viabilidad</th>
                    <th>Ver o editar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
        <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-color: #616A6B">
                        <h5 class="modal-title" id="exampleModalLabel">Crear lista de chequeo</h5> 
                        <a href="" class="btn btn-secondary" data-dismiss="modal">X</a>
                    </div>
                    <div class="modal-body">
                        @include('flash::message')
                        <form action="/listachequeo/guardar" method="POST" name="FrmCrearListaChequeo" id="FrmCrearListaChequeo"enctype="multipart/form-data">
                        @csrf
                                <div id="smartwizard">
                                    <ul>
                                        <li><a href="#step-1">Paso 1<br /><small>Información general</small></a></li>
                                        <li><a href="#step-2">Paso 2<br /><small>Ubicación máquina</small></a></li>
                                        <li><a href="#step-3">Paso 3<br /><small>Seguridad de la obra</small></a></li>
                                        <li><a href="#step-4">Paso 4<br /><small>Suministros</small></a></li>
                                        <li><a href="#step-5">Paso 5<br /><small>Información visita</small></a></li>
                                    </ul>
                                    <div>
                                        <div id="step-1">
                                            <div class="card-header">
                                                    <strong>Información inicial</strong>
                                            </div>
                                            <div class="row">
                                                    <div class="form-group col-md-6">
                                                            <label for="">N° visita</label>
                                                            <label class="validacion" id="val_idvisita"></label>
                                                            <select id="idvisita"  name= "idvisita"  class="form-control @error('idvisita') is-invalid @enderror">
                                                            <option value="0">Seleccione</option>
                                                            @foreach($visita as $key =>$value)
                                                                <option value="{{ $value->id }}" {{(old('idvisita')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('idvisita')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_idvisita2"></label>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Número planilla</label>
                                                        <label class="validacion" id="val_numeroplanilla"></label><img src="img/info.png" class="img-fluid" width="20px" data-toggle="tooltip" data-placement="top" title="Ingrese el número asignado para esta visita">
                                                        <input type="text" class="form-control @error('numeroplanilla') is-invalid @enderror"  name="numeroplanilla" id="numeroplanilla">
                                                        @error('numeroplanilla')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_numeroplanilla2"></label>
                                                    </div>
                                            </div>
                                            <div class="card-header col-md-12">
                                                        <strong>Acceso máquina</strong>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-6">
                                                            <label class="radio-inline">Estado de la vía para ingreso en grúa</label>
                                                            <label class="validacion"id="val_estadovia"></label>
                                                            <select class="form-control @error('estadovia') is-invalid @enderror" name="estadovia" id="estadovia">
                                                            <option value="NS">Seleccione</option>
                                                                    <option value="SI">SI</option>
                                                                    <option value="NO">NO</option>
                                                                </select>
                                                                @error('estadovia')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <label class="validacion" id="val_estadovia2"></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                        <label class="radio-inline">Necesidad PH</label>
                                                        <label class="validacion" id="val_ph"></label>
                                                        <select class="form-control @error('ph') is-invalid @enderror" name="ph" id="ph">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
                                                            </select>
                                                            @error('ph')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_ph2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-2">
                                            <div class="card-header">
                                                <strong>Ubicación máquina</strong>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                        <label class="radio-inline">Hueco (mínimo 6x3 metros)</label>
                                                        <label class="validacion" id="val_hueco"></label>
                                                        <select class="form-control @error('hueco') is-invalid @enderror" name="hueco" id="hueco">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
                                                            </select>
                                                        @error('hueco')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_hueco2"></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="radio-inline">Techo mínimo 3 mt altura</label>
                                                    <label class="validacion" id="val_techo"></label>
                                                    <select class="form-control @error('techo') is-invalid @enderror" name="techo" id="techo">
                                                    <option value="NS">Seleccione</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        @error('techo')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_techo2"></label>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-3">
                                                        <label class="radio-inline">Desarenadero</label>
                                                        <label class="validacion" id="val_desarenadero"></label>
                                                        <select class="form-control @error('desarenadero') is-invalid @enderror" name="desarenadero" id="desarenadero">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('desarenadero')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_desarenadero2"></label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                        <label class="radio-inline">Desagüe</label>
                                                        <label class="validacion" id="val_desague"></label>
                                                        <select class="form-control @error('desague') is-invalid @enderror" name="desague" id="desague">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('desague')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_desague2"></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                        <label class="radio-inline">Agua abastecimiento suficiente</label>
                                                        <label class="validacion" id="val_agua"></label>
                                                        <select class="form-control @error('agua') is-invalid @enderror" name="agua" id="agua">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('agua')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_agua2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-3" class="">
                                                <div class="card-header">
                                                    <strong>Seguridad de la obra</strong>
                                                </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                        <label class="radio-inline">Líneas eléctricas</label>
                                                        <label class="validacion" id="val_lineaelectrica"></label>
                                                        <select class="form-control @error('lineaelectrica') is-invalid @enderror" name="lineaelectrica" id="lineaelectrica">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('lineaelectrica')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_lineaelectrica2"></label>
                                                </div>
                                                <div class="form-group col-md-8">
                                                        <label class="radio-inline">Señalización de escalas, volados, pilas</label>
                                                        <label class="validacion" id="val_senializacion"></label>
                                                        <select class="form-control @error('senializacion') is-invalid @enderror" name="senializacion" id="senializacion">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('senializacion')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_senializacion2"></label>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">Iluminación nocturna</label>
                                                    <label class="validacion" id="val_iluminacion"></label>
                                                    <select class="form-control @error('iluminacion') is-invalid @enderror" name="iluminacion" id="iluminacion">
                                                    <option value="NS">Seleccione</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        @error('iluminacion')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_iluminacion2"></label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="radio-inline">Baños</label>
                                                    <label class="validacion" id="val_banios"></label>
                                                    <select class="form-control @error('banios') is-invalid @enderror" name="banios" id="banios">
                                                    <option value="NS">Seleccione</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        @error('banios')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_banios2"></label>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="radio-inline">Condiciones inseguras</label>
                                                    <label class="validacion" id="val_condicioninsegura"></label>
                                                    <select class="form-control @error('condicioninsegura') is-invalid @enderror" name="condicioninsegura" id="condicioninsegura">
                                                    <option value="NS">Seleccione</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        @error('condicioninsegura')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_condicioninsegura2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-4" class="">
                                                <div class="card-header">
                                                    <strong>Suministros</strong>
                                                </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                        <label class="radio-inline">Orden público</label>
                                                        <label class="validacion" id="val_ordenpublico"></label>
                                                        <select class="form-control @error('ordenpublico') is-invalid @enderror" name="ordenpublico" id="ordenpublico">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('ordenpublico')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_ordenpublico2"></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                        <label class="radio-inline">Vigilancia nocturna</label>
                                                        <label class="validacion" id="val_vigilancia"></label>
                                                        <select class="form-control @error('vigilancia') is-invalid @enderror" name="vigilancia" id="vigilancia">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('vigilancia')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_vigilancia2"></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">Caspete</label>
                                                    <label class="validacion" id="val_caspete"></label>
                                                    <select class="form-control @error('caspete') is-invalid @enderror" name="caspete" id="caspete">
                                                    <option value="NS">Seleccione</option>
                                                            <option value="SI">SI CUMPLE</option>
                                                            <option value="NO">NO CUMPLE</option>
                                                        </select>
                                                        @error('caspete')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_caspete2"></label>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-7">
                                                        <label class="radio-inline">Información de seguridad y salud en el trabajo</label>
                                                        <label class="validacion" id="val_infoSST"></label>
                                                        <select class="form-control @error('infoSST') is-invalid @enderror" name="infoSST" id="infoSST">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                            @error('infoSST')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_infoSST2"></label>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="radio-inline">Políticas horas extras, trabajo nocturno</label>
                                                    <label class="validacion" id="val_politicashoras"></label>
                                                    <select class="form-control @error('politicashoras') is-invalid @enderror" name="politicashoras" id="politicashoras">
                                                    <option value="NS">Seleccione</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        @error('politicashoras')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_politicashoras2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-5" class="">
                                                <div class="card-header">
                                                    <strong>Información cierre de visita</strong>
                                                </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Encargado visita</label>
                                                    <label class="validacion"id="val_encargadovisita"></label>
                                                    <input onkeypress="return soloLetras(event)" type="text" class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
                                                    @error('encargadovisita')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <label class="validacion"id="val_encargadovisita2"></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="radio-inline">Viabilidad</label>
                                                    <label class="validacion" id="val_viabilidad"></label>
                                                    <select class="form-control @error('viabilidad') is-invalid @enderror" name="viabilidad" id="viabilidad">
                                                        <option value="NS">Seleccione</option>
                                                        <option value="SI">VIABLE</option>
                                                        <option value="NO">NO VIABLE</option>
                                                    </select>
                                                    @error('viabilidad')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <label class="validacion" id="val_viabilidad2"></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success float-left">Crear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/styleListaChequeo.css') }}" rel="stylesheet">
@endsection
@section("scripts")
    <script>
        $('#tbl_listachequeo').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/listachequeo/listar',
                columns: [
                    {
                    data: 'idvisita',
                    name: 'idvisita',
                    orderable: false,
                    searchable: false
                    },
                    {
                    data: 'numeroplanilla',
                    name: 'numeroplanilla'
                    },
                    {
                        data: 'encargadovisita',
                        name: 'encargadovisita'
                    },
                    {
                        data: 'viabilidad',
                        name: 'viabilidad'
                    }
                    ,{
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                ], "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                            }
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionListaChequeo.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/tooltips.js') }}"></script>
@endsection
