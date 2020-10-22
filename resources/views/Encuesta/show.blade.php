@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Encuesta</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
    <form action="/encuesta/guardar" method="POST" enctype="multipart/form-data">
    @csrf
        <h2>Información del cliente</h2>
        <input type="hidden" id="id">
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="">N° del servicio</label>
                <input type="text" value="{{ $encuesta->idservicio }}" readonly id="idservicio" name="idservicio" class="form-control">
                @error('idservicio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Nombre del director de la obra</label>
                <input type="text" class="form-control @error('directorobra') is-invalid @enderror" readonly id="directorobra" name="directorobra" value="{{ $encuesta->directorobra }}">
                @error('directorobra')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Constructora</label>
                <input type="text" class="form-control @error('constructora') is-invalid @enderror" readonly id="constructora" name="constructora" value="{{ $encuesta->constructora }}">
                @error('constructora')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="">Correo</label>
                <input type="text" class="form-control @error('correo') is-invalid @enderror" readonly id="correo" name="correo" value="{{ $encuesta->correo }}">
                @error('correo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Celular</label>
                <input type="tel" class="form-control @error('celular') is-invalid @enderror" readonly id="celular" name="celular" placeholder="Ejm: 3212345678" value="{{ $encuesta->celular }}">
                @error('celular')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Fecha</label>
                <input type="date" class="form-control @error('mes') is-invalid @enderror" readonly id="mes" name="mes" value="{{ $encuesta->mes }}" >
                @error('mes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <hr style="border-color:red;">
            <br>
                <h2>Preguntas</h2>
            <br>
                <p><b>1.</b> Califique de 1 a 5 los siguientes aspectos prestados por Vinicol Bombeos</p>
            <div class="form-row" >
            <div class="form-group col-md-3">
                <label for="">Puntualidad</label>
                <input type="text" class="form-control @error('respuesta1_1') is-invalid @enderror" readonly id="respuesta1_1" name="respuesta1_1" value="{{ $encuesta->respuesta1_1 }}">
                @error('respuesta1_1')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Solución de problemas</label>
                <input type="text" class="form-control @error('respuesta1_2') is-invalid @enderror" readonly id="respuesta1_2" name="respuesta1_2" value="{{$encuesta->respuesta1_2}}">
                @error('respuesta1_2')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Orden y aseo</label>
                <input type="text" class="form-control @error('respuesta1_3') is-invalid @enderror" readonly id="respuesta1_3" name="respuesta1_3" value="{{ $encuesta->respuesta1_3 }}">
                @error('respuesta1_3')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Cumplimiento en requisitos</label>
                <input type="text" class="form-control @error('respuesta1_4') is-invalid @enderror" readonly id="respuesta1_4" name="respuesta1_4" value="{{ $encuesta->respuesta1_4 }}">
                @error('respuesta1_4')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>2.</b> tuvo algun inconveniente durante la prestación del servicio</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI - NO</label>
                <input type="text" class="form-control @error('respuesta2') is-invalid @enderror" readonly id="respuesta2" name="respuesta2" value="{{ $encuesta->respuesta2 }}">
                @error('respuesta2')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>3.</b> Si la <u>respuesta 2</u> fué SI, describa la situación:</p>
            <div class="form-row">
                <div class="form-group col-md-12">
                <textarea class="form-control @error('respuesta3') is-invalid @enderror" readonly id="respuesta3" name="respuesta3" placeholder="Ingresa las observaciones" value="">{{ $encuesta->respuesta3 }}</textarea>
                @error('respuesta3')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI - NO</label>
                <input type="text" class="form-control @error('respuesta4') is-invalid @enderror" readonly id="respuesta4" name="respuesta4" value="{{ $encuesta->respuesta4 }}">
                @error('respuesta4')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>5.</b> Que aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado. </p>
            <div class="form-row">
                <div class="form-group col-md-12">
                <textarea class="form-control @error('respuesta5') is-invalid @enderror " readonly id="respuesta5" name="respuesta5" placeholder="Ingresa las observaciones" value="{{old('respuesta5')}}">{{ $encuesta->respuesta5 }}</textarea>
                @error('respuesta5')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>6.</b> Volvería Usted a Utilizar los servicios de VINICOL BOMBEOS</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI - NO</label>
                <input type="text" class="form-control @error('respuesta6') is-invalid @enderror" readonly id="respuesta6" name="respuesta6" value="{{ $encuesta->respuesta6 }}">
                @error('respuesta6')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>7.</b> Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI - NO</label>
                <input type="text" class="form-control @error('respuesta7') is-invalid @enderror" readonly id="respuesta7" name="respuesta7" value="{{ $encuesta->respuesta7 }}">
                @error('respuesta7')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <!-- <button type="submit" class="btn btn-success">Guardar Encuesta</button> -->
            <a href="/encuesta" class="btn btn-outline-primary" >Volver</a>
        </div>
    </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/validacionEncuesta.js') }}"></script>
    <script>



    </script>
@endsection
