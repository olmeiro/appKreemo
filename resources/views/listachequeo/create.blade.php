@extends('layouts.app')

@section('body')

<div class="card">
        <div class="card-header">
            <strong>Crear Lista de chequeo</strong>
        </div>
    <div class="card-body">
        @include('flash::message')
        <form action="/listachequeo/guardar" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="">
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
                                    <input type="text" id="idvisita" name="idvisita" class="form-control" value="{{ $value->id }}">
                                    <!-- <select id="idvisita"  name= "idvisita"  class="form-control @error('idvisita') is-invalid @enderror">
                            <option selected>Seleccione una visita</option>
                            @foreach($visita as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('idvisita')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                            @endforeach
                        </select> -->
                                    @error('idvisita')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Numero Planilla</label>
                                    <input type="text" class="form-control @error('numeroplanilla') is-invalid @enderror"  name="numeroplanilla" id="numeroplanilla">
                                    @error('numeroplanilla')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                                <select class="form-control @error('estadovia') is-invalid @enderror" name="estadovia" id="estadovia">
                                <option value="NS">Seleccione</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    @error('estadovia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                <label class="radio-inline">Necesidad PH</label>
                                <select class="form-control @error('ph') is-invalid @enderror" name="ph" id="ph">
                                <option value="NS">Seleccione</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    @error('ph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                            <select class="form-control @error('hueco') is-invalid @enderror" name="hueco" id="hueco">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('hueco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                            <label class="radio-inline">Techo mínimo 3 mt altura</label>
                            <select class="form-control @error('techo') is-invalid @enderror" name="techo" id="techo">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('techo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row" >
                            <div class="form-group col-md-3">
                            <label class="radio-inline">Desarenadero</label>
                            <select class="form-control @error('desarenadero') is-invalid @enderror" name="desarenadero" id="desarenadero">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('desarenadero')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                            <label class="radio-inline">Desague</label>
                            <select class="form-control @error('desague') is-invalid @enderror" name="desague" id="desague">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('desague')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                            <label class="radio-inline">Agua abastecimiento suficiente</label>
                            <select class="form-control @error('agua') is-invalid @enderror" name="agua" id="agua">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('agua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <select class="form-control @error('lineaelectrica') is-invalid @enderror" name="lineaelectrica" id="lineaelectrica">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('lineaelectrica')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-8">
                            <label class="radio-inline">Señalización de escalas, volados, pilas</label>
                            <select class="form-control @error('senializacion') is-invalid @enderror" name="senializacion" id="senializacion">
                            <option value="">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('senializacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row" >
                            <div class="form-group col-md-4">
                            <label class="radio-inline">Iluminación nocturna</label>
                            <select class="form-control @error('iluminacion') is-invalid @enderror" name="iluminacion" id="iluminacion">
                            <option value="">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('iluminacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                            <label class="radio-inline">Baños</label>
                            <select class="form-control @error('banios') is-invalid @enderror" name="banios" id="banios">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('banios')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-5">
                            <label class="radio-inline">Condiciones inseguras</label>
                            <select class="form-control @error('condicioninsegura') is-invalid @enderror" name="condicioninsegura" id="condicioninsegura">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('condicioninsegura')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <select class="form-control @error('ordenpublico') is-invalid @enderror" name="ordenpublico" id="ordenpublico">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('ordenpublico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <label class="radio-inline">Vigilancia nocturna</label>
                            <select class="form-control @error('vigilancia') is-invalid @enderror" name="vigilancia" id="vigilancia">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('vigilancia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <label class="radio-inline">Caspete</label>
                            <select class="form-control @error('caspete') is-invalid @enderror" name="caspete" id="caspete">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('caspete')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row" >
                            <div class="form-group col-md-7">
                            <label class="radio-inline">Informacion de seguridad y salud en el trabajo</label>
                            <select class="form-control @error('infoSST') is-invalid @enderror" name="infoSST" id="infoSST">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('infoSST')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                            <label class="radio-inline">Horas extras, trabajo nocturno</label>
                            <select class="form-control @error('politicashoras') is-invalid @enderror" name="politicashoras" id="politicashoras">
                            <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('politicashoras')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input type="text" onkeypress="return soloLetras(event)"  class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
                                @error('encargadovisita')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                            <label class="radio-inline">Viabilidad</label>
                            <select class="form-control @error('viabilidad') is-invalid @enderror" name="viabilidad" id="viabilidad">
                                    <option value="NS">Seleccione</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                @error('viabilidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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

<script>

</script>

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