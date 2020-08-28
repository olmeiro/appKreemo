@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Actualizar Lista chequeo</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/listachequeo/actualizar" method="POST">
        @csrf  
        <input type="hidden" name="id" value="{{$listachequeo->id}}"/>
        <div class="row">          
        <div class="col-3">
                    <div class="form-group">
                        <label for="">Numero Planilla</label>
                        <input type="text" value="{{$listachequeo->numeroplanilla}}"class="form-control @error('numeroplanilla') is-invalid @enderror"  name="numeroplanilla" id="numeroplanilla">
                        @error('numeroplanilla')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="col-12" align="center">
                    <div class="form-group">
                        <label for="">ACCESO MÁQUINA</label>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                    <label   class="radio-inline">Estado de la vía para ingreso en grúa     
                    <select class="form-control @error('estadovia') is-invalid @enderror" name="estadovia" id="estadovia">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->estadovia == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->estadovia == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('estadovia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Necesidad PH  
                    <select class="form-control @error('ph') is-invalid @enderror" name="ph" id="ph">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->ph == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->ph == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('ph')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-12"align="center">
                    <div class="form-group">
                        <label for="">UBICACIÓN MÁQUINA</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Hueco (debe tener como mínimo 6x3 metros)  
                    <select class="form-control @error('hueco') is-invalid @enderror" name="hueco" id="hueco">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->hueco == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->hueco == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('hueco')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Techo 3 metros de altura como mínimo
                    <select class="form-control @error('techo') is-invalid @enderror" name="techo" id="techo">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->techo == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->techo == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('techo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Desarenadero 
                    <select class="form-control @error('desarenadero') is-invalid @enderror" name="desarenadero" id="desarenadero">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->desarenadero == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->desarenadero == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('desarenadero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Desague
                    <select class="form-control @error('desague') is-invalid @enderror" name="desague" id="desague">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->desague == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->desague == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('desague')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Agua abastecimiento suficiente
                    <select class="form-control @error('agua') is-invalid @enderror" name="agua" id="agua">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->agua == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->agua == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('agua')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-12"align="center">
                    <div class="form-group">
                        <label for="">SEGURIDAD DE LA OBRA:Esta informacion es verificada por el personal de Vinicol Bombeos</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Líneas eléctricas
                    <select class="form-control @error('lineaelectrica') is-invalid @enderror" name="lineaelectrica" id="lineaelectrica">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->lineaelectrica == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->lineaelectrica == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('lineaelectrica')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Señalización de escalas, volados, pilas 
                    <select class="form-control @error('senializacion') is-invalid @enderror" name="senializacion" id="senializacion">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->senializacion == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->senializacion == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('senializacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Iluminación nocturna
                    <select class="form-control @error('iluminacion') is-invalid @enderror" name="iluminacion" id="iluminacion">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->iluminacion == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->iluminacion == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('iluminacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Baños  
                    <select class="form-control @error('banios') is-invalid @enderror" name="banios" id="banios">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->banios == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->banios == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('banios')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Condiciones inseguras 
                    <select class="form-control @error('condicioninsegura') is-invalid @enderror" name="condicioninsegura" id="condicioninsegura">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->condicioninsegura == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->condicioninsegura == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('condicioninsegura')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-12"align="center">
                    <div class="form-group">
                        <label for="">SUMINISTROS</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Orden público 
                    <select class="form-control @error('ordenpublico') is-invalid @enderror" name="ordenpublico" id="ordenpublico">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->ordenpublico == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->ordenpublico == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('ordenpublico')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Vigilancia nocturna 
                    <select class="form-control @error('vigilancia') is-invalid @enderror" name="vigilancia" id="vigilancia">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->vigilancia == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->vigilancia == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('vigilancia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Caspete
                    <select class="form-control @error('caspete') is-invalid @enderror" name="caspete" id="caspete">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->caspete == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->caspete == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('caspete')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Entrega de informacion de seguridad y salud en el trabajo: Plegable 
                    <select class="form-control @error('infoSST') is-invalid @enderror" name="infoSST" id="infoSST">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->infoSST == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->infoSST == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('infoSST')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Políticas de horas extras, trabajo nocturno
                    <select class="form-control @error('politicashoras') is-invalid @enderror" name="politicashoras" id="politicashoras">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->politicashoras == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->politicashoras == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('politicashoras')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="col-3" align="center">
                    <div class="form-group">
                        <label for="">Encargado Visita</label>
                        <input type="text" value= "{{$listachequeo->encargadovisita}}" class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
                        @error('encargadovisita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Viabilidad 
                    <select class="form-control @error('viabilidad') is-invalid @enderror" name="viabilidad" id="viabilidad">
                            <option value="">Seleccione</option>
                            <option value="SI"{{ $listachequeo->viabilidad == 'SI' ? 'selected' : ''}}>SI</option>
                            <option value="NO"{{ $listachequeo->viabilidad == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>   
                        @error('viabilidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>   
        </div>
    </div>
@endsection