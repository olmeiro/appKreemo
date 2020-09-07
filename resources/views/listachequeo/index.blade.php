@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>LISTA DE CHEQUEO</strong>
            <a href="/listachequeo/crear" class="btn btn-link">Crear listachequeo</a>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#crear">Crear Lista de Chequeo </button>
            
        </div>
        
        <div class="card-body">
                 @include('flash::message')
            <table id="tbl_listachequeo" class="table table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>Lista Chequeo No</th>
                    <th>Id Visita</th>
                    <th>Número Planilla</th>
                    <th>Estado Via para ingreso grúa</th>
                    <th>Necesidad de PH</th>
                    <th>Hueco (min 6*3 mts)</th>
                    <th>Techo (min 3mts de altura)</th>
                    <th>Desarenadero</th>
                    <th>Desague</th>
                    <th>Agua suficiente</th>
                    <th>Líneas Eléctricas</th>
                    <th>Señalización (escalas, volados y pilas)</th>
                    <th>Baños</th>
                    <th>Condiciones Inseguras</th>
                    <th>Orden Público</th>
                    <th>Vigilancia Nocturna</th>
                    <th>Caspete</th>
                    <th>Información de SST</th>
                    <th>Políticas de horas extras</th>
                    <th>Encargado Visita</th>
                    <th>Viabilidad</th>
                    <th>Editar</th>
                    <!-- <th>Cambiar Viabilidad</th>  -->
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    

        <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Lista de Chequeo</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        @include('flash::message')
                        <form action="/listachequeo/guardar" method="POST" name="FrmCrearListaChequeo" id="FrmCrearListaChequeo"enctype="multipart/form-data">
                         @csrf
                                <div id="smartwizard">
                                    <ul>
                                        <li><a href="#step-1">Paso 1<br /><small>INFORMACIÓN GENERAL</small></a></li>
                                        <li><a href="#step-2">Paso 2<br /><small>UBICACIÓN MÁQUINA</small></a></li>
                                        <li><a href="#step-3">Paso 3<br /><small>SEGURIDAD DE LA OBRA</small></a></li>
                                        <li><a href="#step-4">Paso 4<br /><small>SUMINISTROS</small></a></li>
                                        <li><a href="#step-5">Paso 5<br /><small>INFORMACIÓN VISITA</small></a></li>
                                    </ul>
                                    <div>
                                        <div id="step-1">
                                            <div class="card-header">
                                                    <strong>INFORMACIÓN INICIAL</strong>
                                            </div>
                                            <div class="row">
                                                    <div class="form-group col-md-6">
                                                            <label for="">Id Visita</label>
                                                            <label class="validacion" id="val_idvisita"></label>
                                                            <select id="idvisita"  name= "idvisita"  class="form-control @error('idvisita') is-invalid @enderror">
                                                            <option selected>Seleccione una visita</option>
                                                            @foreach($visita as $key =>$value)
                                                                <option value="{{ $value->id }}" {{(old('idvisita')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                                            @endforeach
                                                         </select>
                                                            @error('idvisita')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_idvisita"></label>
                                                    </div>
                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="">Numero Planilla</label>
                                                        <label class="validacion" id="val_numeroplanilla"></label>
                                                        <input type="text" class="form-control @error('numeroplanilla') is-invalid @enderror"  name="numeroplanilla" id="numeroplanilla">
                                                        @error('numeroplanilla')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="validacion" id="val_numeroplanilla2"></label>
                                                    </div>
                                            </div>
                                            <div class="card-header col-md-12">
                                                        <strong>ACCESO MÁQUINA</strong>
                                            </div>
                                            <div class="row mt-3">
                                            
                                                <div class="form-group col-md-6">
                                                            <label class="radio-inline">Estado de la vía para ingreso en grúa</label>
                                                            <label class="validacion"id="val_estadovia"></label>  
                                                            <select class="form-control @error('estadovia') is-invalid @enderror" name="estadovia" id="estadovia">
                                                            <option value="NS">Seleccione</option>
                                                                    <option value="SI">SI CUMPLE</option>
                                                                    <option value="NO">NO CUMPLE</option>
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
                                                <strong>UBICACIÓN MÁQUINA</strong>
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
                                                            <option value="SI">SI CUMPLE</option>
                                                            <option value="NO">NO CUMPLE</option>
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
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
                                                            </select>
                                                            @error('desarenadero')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <label class="validacion" id="val_desarenadero2"></label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                        <label class="radio-inline">Desague</label>
                                                        <label class="validacion" id="val_desague"></label>
                                                        <select class="form-control @error('desague') is-invalid @enderror" name="desague" id="desague">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
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
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
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
                                                    <strong>SEGURIDAD DE LA OBRA</strong>
                                                </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                        <label class="radio-inline">Líneas eléctricas</label>
                                                        <label class="validacion" id="val_lineaelectrica"></label>
                                                        <select class="form-control @error('lineaelectrica') is-invalid @enderror" name="lineaelectrica" id="lineaelectrica">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
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
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
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
                                                            <option value="SI">SI CUMPLE</option>
                                                            <option value="NO">NO CUMPLE</option>
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
                                                            <option value="SI">SI CUMPLE</option>
                                                            <option value="NO">NO CUMPLE</option>
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
                                                            <option value="SI">SI CUMPLE</option>
                                                            <option value="NO">NO CUMPLE</option>
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
                                                     <strong>SUMINISTROS</strong>
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
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
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
                                                        <label class="radio-inline">Informacion de seguridad y salud en el trabajo</label>
                                                        <label class="validacion" id="val_infoSST"></label>
                                                        <select class="form-control @error('infoSST') is-invalid @enderror" name="infoSST" id="infoSST">
                                                        <option value="NS">Seleccione</option>
                                                                <option value="SI">SI CUMPLE</option>
                                                                <option value="NO">NO CUMPLE</option>
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
                                                            <option value="SI">SI CUMPLE</option>
                                                            <option value="NO">NO CUMPLE</option>
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
                                                    <strong>INFORMACIÓN CIERRE DE VISITA</strong>
                                                </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Encargado Visita</label>
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
                                                    <button type="submit" class="btn btn-success float-left">Guardar</button>
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
                     data: 'id',
                     name: 'id',
                     orderable: false,
                     searchable: false
                    },
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
                        data: 'estadovia',
                        name: 'estadovia'
                    },
                    {
                        data: 'ph',
                        name: 'ph'
                    },
                   
                    {
                        data: 'hueco',
                        name: 'hueco'
                    },
                    {
                        data: 'techo',
                        name: 'techo'
                    },
                    {
                        data: 'desarenadero',
                        name: 'desarenadero'
                    },
                    {
                        data: 'desague',
                        name: 'desague'
                    },
                   
                    {
                        data: 'agua',
                        name: 'agua'
                    },
                    {
                        data: 'lineaelectrica',
                        name: 'lineaelectrica'
                    },
                    {
                        data: 'senializacion',
                        name: 'senializacion'
                    },
                    {
                        data: 'banios',
                        name: 'banios'
                    },
                    {
                        data: 'condicioninsegura',
                        name: 'condicioninsegura'
                    },
                    {
                        data: 'ordenpublico',
                        name: 'ordenpublico'
                    },
                    {
                        data: 'vigilancia',
                        name: 'vigilancia'
                    },
                   
                    {
                        data: 'caspete',
                        name: 'caspete'
                    },
                    {
                        data: 'infoSST',
                        name: 'infoSST'
                    },
                    {
                        data: 'politicashoras',
                        name: 'politicashoras'
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
                    // {
                    //     data: 'cambiar',
                    //     name: 'cambiar',
                    //     orderable: false,
                    //     searchable: false
                    // }
                ]
            });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionListaChequeo.js') }}"></script>



   
@endsection

