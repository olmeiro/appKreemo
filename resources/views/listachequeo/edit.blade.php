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
                    <input type="radio" name="estadovia" id="estadovia"  
                    {{ $listachequeo->estadovia == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="estadovia" id="estadovia"  
                    {{ $listachequeo->estadovia == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Necesidad PH  <input type="radio" name="ph" id="ph"  {{ $listachequeo->ph == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="ph" id="ph"  {{ $listachequeo->ph == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-12"align="center">
                    <div class="form-group">
                        <label for="">UBICACIÓN MÁQUINA</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Hueco (debe tener como mínimo 6x3 metros)  <input type="radio" name="hueco" id="hueco"  {{ $listachequeo->hueco == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="hueco" id="hueco"  {{ $listachequeo->hueco == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Techo 3 metros de altura como mínimo
                    <input type="radio" name="techo" id="techo"  {{ $listachequeo->techo == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="techo" id="techo"  {{ $listachequeo->techo == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Desarenadero 
                    <input type="radio" name="desarenadero" id="desarenadero"  {{ $listachequeo->desarenadero == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="desarenadero" id="desarenadero"  {{ $listachequeo->desarenadero == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Desague
                    <input type="radio" name="desague" id="desague"  {{ $listachequeo->desague == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="desague" id="desague"  {{ $listachequeo->desague == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Agua abastecimiento suficiente
                    <input type="radio" name="agua" id="agua"  {{ $listachequeo->agua == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="agua" id="agua"  {{ $listachequeo->agua == 'NO' ? 'checked' : ''}}>NO</label>
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
                    <input type="radio" name="lineaelectrica" id="lineaelectrica"  {{ $listachequeo->lineaelectrica == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="lineaelectrica" id="lineaelectrica"  {{ $listachequeo->lineaelectrica == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Señalización de escalas, volados, pilas 
                    <input type="radio" name="senializacion" id="senializacion"  {{ $listachequeo->senializacion == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="senializacion" id="senializacion"  {{ $listachequeo->senializacion == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Iluminación nocturna
                    <input type="radio" name="iluminacion" id="iluminacion"  {{ $listachequeo->iluminacion == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="iluminacion" id="iluminacion"  {{ $listachequeo->iluminacion == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Baños  
                    <input type="radio" name="banios" id="banios"  {{ $listachequeo->banios == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="banios" id="banios"  {{ $listachequeo->banios == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Condiciones inseguras 
                    <input type="radio" name="condicioninsegura" id="condicioninsegura"  {{ $listachequeo->condicioninsegura == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="condicioninsegura" id="condicioninsegura"  {{ $listachequeo->condicioninsegura == 'NO' ? 'checked' : ''}}>NO</label>
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
                    <input type="radio" name="ordenpublico" id="ordenpublico"  {{ $listachequeo->ordenpublico == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="ordenpublico" id="ordenpublico"  {{ $listachequeo->ordenpublico == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Vigilancia nocturna 
                    <input type="radio" name="vigilancia" id="vigilancia"  {{ $listachequeo->vigilancia == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="vigilancia" id="vigilancia"  {{ $listachequeo->vigilancia == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Caspete
                    <input type="radio" name="caspete" id="caspete"  {{ $listachequeo->caspete == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="caspete" id="caspete"  {{ $listachequeo->caspete == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Entrega de informacion de seguridad y salud en el trabajo: Plegable 
                    <input type="radio" name="infoSST" id="infoSST"  {{ $listachequeo->infoSST == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="infoSST" id="infoSST"  {{ $listachequeo->infoSST == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Políticas de horas extras, trabajo nocturno
                    <input type="radio" name="politicashoras" id="politicashoras"  {{ $listachequeo->politicashoras == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="politicashoras" id="politicashoras"  {{ $listachequeo->politicashoras == 'NO' ? 'checked' : ''}}>NO</label>
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
                    <input type="radio" name="viabilidad" id="viabilidad"  {{ $listachequeo->viabilidad == 'SI' ? 'checked' : ''}}>SI</label>
                    <label   class="radio-inline"><input type="radio" name="viabilidad" id="viabilidad"  {{ $listachequeo->viabilidad == 'NO' ? 'checked' : ''}}>NO</label>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>   
        </div>
    </div>
@endsection