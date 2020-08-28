@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Lista de chequeo</strong>
            <a href="/listachequeo/crear" class="btn btn-link">Crear Empresa</a>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/listachequeo/guardar" method="POST" enctype="multipart/form-data">
        @csrf  
            <div class="row">  

            <div class="col-3">
                    <div class="form-group">
                        <label for="">Id Visita</label>
                        <input type="text" class="form-control @error('idvisita') is-invalid @enderror"  name="idvisita" id="idvisita">
                        @error('idvisita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-3">
                    <div class="form-group">
                        <label for="">Numero Planilla</label>
                        <input type="text" class="form-control @error('numeroplanilla') is-invalid @enderror"  name="numeroplanilla" id="numeroplanilla">
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
                    <label class="radio-inline">Estado de la vía para ingreso en grúa 
                   {!! Form::radio('estadovia', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('estadovia', "NO", null,['required']) !!} NO</label> -->
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Necesidad PH 
                    {!! Form::radio('ph', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('ph', "NO", null,['required']) !!} NO</label>
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
                    {!! Form::radio('hueco', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('hueco', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Techo 3 metros de altura como mínimo
                    {!! Form::radio('techo', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('techo', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Desarenadero 
                    {!! Form::radio('desarenadero', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('desarenadero', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Desague
                     {!! Form::radio('desague', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('desague', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Agua abastecimiento suficiente
                    {!! Form::radio('agua', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('agua', "NO", null,['required']) !!} NO</label>
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
                     {!! Form::radio('lineaelectrica', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('lineaelectrica', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Señalización de escalas, volados, pilas 
                    {!! Form::radio('senializacion', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('senializacion', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Iluminación nocturna
                     {!! Form::radio('iluminacion', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('iluminacion', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Baños  
                    {!! Form::radio('banios', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('banios', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Condiciones inseguras 
                    {!! Form::radio('condicioninsegura', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('condicioninsegura', "NO", null,['required']) !!} NO</label>
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
                    {!! Form::radio('ordenpublico', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('ordenpublico', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Vigilancia nocturna 
                    {!! Form::radio('vigilancia', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('vigilancia', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Caspete
                     {!! Form::radio('caspete', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('caspete', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Entrega de informacion de seguridad y salud en el trabajo: Plegable 
                    {!! Form::radio('infoSST', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('infoSST', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Políticas de horas extras, trabajo nocturno
                     {!! Form::radio('politicashoras', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('politicashoras', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


                
                <div class="col-3" align="center">
                    <div class="form-group">
                        <label for="">Encargado Visita</label>
                        <input type="text" class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
                        @error('encargadovisita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Viabilidad 
                    {!! Form::radio('viabilidad', "SI", null,['required']) !!} SI</label>
                    <label class="radio-inline">
                    {!! Form::radio('viabilidad', "NO", null,['required']) !!} NO</label>
                    </div>
                </div>


            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>   
        </div>
    </div>
@endsection