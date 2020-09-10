@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>ACTUALIZAR LISTA DE CHEQUEO</strong>
        </div>
    <div class="card-body">
        @include('flash::message')
        <form action="/listachequeo/actualizar" name="FrmEditarListaChequeo" id="FrmEditarListaChequeo"  method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$listachequeo->id}}"/>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #616A6B">
                        <strong>INFORMACIÓN INICIAL</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                                <div class="form-group col-md-6">
                                    <label for="">Id Visita</label>
                                    <label class="validacion" id="val_idvisita"></label>
                                                            <select id="idvisita"  name= "idvisita"  class="form-control @error('idvisita') is-invalid @enderror">
                                                            <option value="0">Seleccione una visita</option>
                                                            @foreach($visita as $key =>$value)
                                <option {{$value->id == $listachequeo->idvisita ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->id}}</option>
                            @endforeach
                                                         </select>
                                    @error('idvisita')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_idvisita2"></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Numero Planilla</label>
                                    <label class="validacion" id="val_numeroplanilla"></label>
                                    <input type="text" value="{{$listachequeo->numeroplanilla}}" class="form-control @error('numeroplanilla') is-invalid @enderror"  name="numeroplanilla" id="numeroplanilla">
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
                    <div class="card-header text-white"style="background-color: #616A6B">
                        <strong>ACCESO MÁQUINA</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                                <div class="form-group col-md-8">
                                <label class="radio-inline">Estado de la vía para ingreso en grúa</label>
                                <label class="validacion"id="val_estadovia"></label>  
                                <select class="form-control @error('estadovia') is-invalid @enderror" name="estadovia" id="estadovia">
                                <option value="NS">Seleccione</option>
                                        <option value="SI"{{ $listachequeo->estadovia == 'SI' ? 'selected' : ''}} >SI</option>
                                        <option value="NO"{{ $listachequeo->estadovia == 'NO' ? 'selected' : ''}}>NO</option>
                                    </select>
                                    @error('estadovia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_estadovia2"></label>
                                </div>
                                <div class="form-group col-md-4">
                                <label class="radio-inline">Necesidad PH</label>
                                <label class="validacion" id="val_ph"></label>
                                <select class="form-control @error('ph') is-invalid @enderror" name="ph" id="ph">
                                <option value="NS">Seleccione</option>
                                        <option value="SI"{{ $listachequeo->ph == 'SI' ? 'selected' : ''}}>SI</option>
                                        <option value="NO"{{ $listachequeo->ph == 'NO' ? 'selected' : ''}}>NO</option>
                                    </select>
                                    @error('ph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="valph2"></label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #616A6B">
                        <strong>UBICACIÓN MÁQUINA</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                            <div class="form-group col-md-6">
                            <label class="radio-inline">Hueco (mínimo 6x3 metros)</label>
                            <label class="validacion" id="val_hueco"></label>
                            <select class="form-control @error('hueco') is-invalid @enderror" name="hueco" id="hueco">
                            <option value="NS">Seleccione</option>
                                    <option value="SI"{{ $listachequeo->hueco == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->hueco == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->techo == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->techo == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->desarenadero == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->desarenadero == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->desague == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->desague == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->agua == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->agua == 'NO' ? 'selected' : ''}}>NO</option>
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
                    <div class="card-header text-white" style="background-color: #616A6B">
                        <strong>SEGURIDAD DE LA OBRA</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                            <div class="form-group col-md-4">
                            <label class="radio-inline">Líneas eléctricas</label>
                            <label class="validacion" id="val_lineaelectrica"></label>
                            <select class="form-control @error('lineaelectrica') is-invalid @enderror" name="lineaelectrica" id="lineaelectrica">
                            <option value="NS">Seleccione</option>
                                    <option value="SI"{{ $listachequeo->lineaelectrica == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->lineaelectrica == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->senializacion == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->senializacion == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->iluminacion == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->iluminacion == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->banios == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->banios == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->condicioninsegura == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->condicioninsegura == 'NO' ? 'selected' : ''}}>NO</option>
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
                    <div class="card-header text-white" style="background-color: #616A6B">
                        <strong>SUMINISTROS</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                            <div class="form-group col-md-4">
                            <label class="radio-inline">Orden público</label>
                            <label class="validacion" id="val_ordenpublico"></label>
                            <select class="form-control @error('ordenpublico') is-invalid @enderror" name="ordenpublico" id="ordenpublico">
                            <option value="NS">Seleccione</option>
                                    <option value="SI"{{ $listachequeo->ordenpublico == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->ordenpublico == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->vigilancia == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->vigilancia == 'NO' ? 'selected' : ''}}>NO</option>
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
                                    <option value="SI"{{ $listachequeo->caspete == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->caspete == 'NO' ? 'selected' : ''}}>NO</option>
                                </select>
                                @error('caspete')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="validacion" id="val_caspete2"></label>
                            </div>
                        </div>
                        <div class="form-row" >
                            <div class="form-group col-md-6">
                            <label class="radio-inline">Informacion de seguridad y salud en el trabajo</label>
                            <label class="validacion" id="val_infoSST"></label>
                            <select class="form-control @error('infoSST') is-invalid @enderror" name="infoSST" id="infoSST">
                            <option value="NS">Seleccione</option>
                                    <option value="SI"{{ $listachequeo->infoSST == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->infoSST == 'NO' ? 'selected' : ''}}>NO</option>
                                </select>
                                @error('infoSST')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="validacion" id="val_infoSST"></label>
                            </div>
                            <div class="form-group col-md-6">
                            <label class="radio-inline">Políticas horas extras, trabajo nocturno</label>
                            <label class="validacion" id="val_politicashoras"></label>
                            <select class="form-control @error('politicashoras') is-invalid @enderror" name="politicashoras" id="politicashoras">
                            <option value="NS">Seleccione</option>
                                    <option value="SI"{{ $listachequeo->politicashoras == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->politicashoras == 'NO' ? 'selected' : ''}}>NO</option>
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
                    <div class="card-header text-white" style="background-color: #616A6B">
                        <strong>INFORMACIÓN CIERRE DE VISITA</strong>
                    </div>
                    <div class="card-body">
                      
                            <div class="form-group col-md-12">
                                <label for="">Encargado Visita</label>
                                <label class="validacion"id="val_encargadovisita"></label>
                                <input onkeypress="return soloLetras(event)" type="text" value= "{{$listachequeo->encargadovisita}}" class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
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
                                    <option value="SI"{{ $listachequeo->viabilidad == 'SI' ? 'selected' : ''}}>SI</option>
                                    <option value="NO"{{ $listachequeo->viabilidad == 'NO' ? 'selected' : ''}}>NO</option>
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
@section("scripts")



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
 <script src="{{ asset('js/validacionListaChequeo.js') }}"></script>

@endsection
@section('style')
 
    <link href="{{ asset('css/styleListaChequeo.css') }}" rel="stylesheet">
@endsection