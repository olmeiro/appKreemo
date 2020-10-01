@extends('layouts.app')

@section('body')

<div class="card">
        <div class="card-header">
            <strong>Crear Lista de chequeo</strong>
        </div>
    <div class="card-body">
        @include('flash::message')
        <form action="/listachequeo/guardar" method="POST" name="FrmCrearListaChequeo" id="FrmCrearListaChequeo" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Informacion Inicial</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                                <div class="form-group col-md-6">
                                    <label for="">Id Visita</label>
                                    <label class="validacion" id="val_idvisita"></label>
                                    <label class="validacion" id="val_idvisita"></label>
                                    <input type="text" value="{{ $id }}" id="idvisita" name="idvisita" class="form-control">
                              
                                    @error('idvisita')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_idvisita2"></label>
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
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>ACCESO MÁQUINA</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                                <div class="form-group col-md-8">
                                <label class="radio-inline">Estado de la vía para ingreso en grúa</label>
                                <label class="validacion" id="val_estadovia"></label>
                                <select class="form-control @error('estadovia') is-invalid @enderror" name="estadovia" id="estadovia">
                                <option value="NS">Seleccione</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    @error('estadovia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                     <label class="validacion"id="val_estadovia2"></label>
                                </div>
                                <div class="form-group col-md-4">
                                <label class="radio-inline">Necesidad PH</label>
                                <label class="validacion" id="val_ph"></label>
                                <select class="form-control @error('ph') is-invalid @enderror" name="ph" id="ph">
                                <option value="NS">Seleccione</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    @error('ph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_ph2"></label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>UBICACIÓN MÁQUINA</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                            <div class="form-group col-md-6">
                            <label class="radio-inline">Hueco (mínimo 6x3 metros)</label>
                            <label class="validacion" id="val_hueco"></label>
                            <select class="form-control @error('hueco') is-invalid @enderror" name="hueco" id="hueco">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
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
                        <div class="form-row" >
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
                            <label class="radio-inline">Desague</label>
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
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>SEGURIDAD DE LA OBRA</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
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
                            <label class="radio-inline">Señalización de escalas, volados, pilas</label> <label class="validacion" id="val_senializacion"></label>
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

                        <div class="form-row" >
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <strong>SUMINISTROS</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
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
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('caspete')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="validacion" id="val_caspete2"></label>
                            </div>
                        </div>
                        <div class="form-row" >
                            <div class="form-group col-md-7">
                            <label class="radio-inline">Informacion de seguridad y salud en el trabajo</label>
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
                            <label class="radio-inline">Horas extras, trabajo nocturno</label>
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
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Personal</strong>
                    </div>
                    <div class="card-body">
                      
                            <div class="form-group col-md-12">
                                <label for="">Encargado Visita</label>
                                <label class="validacion" id="val_encargadovisita"></label>
                                <input type="text" onkeypress="return soloLetras(event)"  class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
                                @error('encargadovisita')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="validacion" id="val_encargadovisita2"></label>
                            </div>
                            <div class="form-group col-md-12">
                            <label class="radio-inline">Viabilidad</label>
                            <label class="validacion" id="val_viabilidad"></label>
                            <select class="form-control @error('viabilidad') is-invalid @enderror" name="viabilidad" id="viabilidad">
                                    <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('viabilidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="validacion" id="val_viabilidad2"></label>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
        </form>
    </div>
</div>
@endsection
@section('style')
  
    <link href="{{ asset('css/styleListaChequeo.css') }}" rel="stylesheet">
@endsection
@section("scripts")

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionListaChequeo.js') }}"></script>

<script>
    function soloLetras(e) {
        var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

        for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        }
    }
</script>
@endsection