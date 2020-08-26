@extends('layouts.app')

@section('body')
<div class="container">

    <h1 align="center">Encuesta</h1>
    <br>
    <form action="/encuesta/guardar" method="POST" enctype="multipart/form-data">
    @csrf
        <h2>Información del cliente</h2>

        <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="">Id del servicio</label>
                <input type="text" class="form-control @error('idservicio') is-invalid @enderror" id="idservicio" name="idservicio">
                @error('idservicio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <!-- <select id="IdObra"  name= "IdObra" class="form-control">
                <option value="0" >Seleccione una Empresa</option>
                </select> -->
            </div>
            <div class="form-group col-md-4">
                <label for="">Nombre del director de la obra</label>
                <input type="text" class="form-control @error('directorobra') is-invalid @enderror" id="directorobra" name="directorobra">
                @error('directorobra')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Constructora</label>
                <input type="text" class="form-control @error('constructora') is-invalid @enderror" id="constructora" name="constructora">
                @error('constructora')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="">Correo</label>
                <input type="text" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo">
                @error('correo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Celular</label>
                <input type="tel" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Ejm: 3212345678">
                @error('celular')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">Fecha</label>
                <input type="date" class="form-control @error('mes') is-invalid @enderror" id="mes" name="mes" >
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
                <input type="text" class="form-control @error('respuesta1_1') is-invalid @enderror" id="respuesta1_1" name="respuesta1_1">
                @error('respuesta1_1')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Solución de problemas</label>
                <input type="text" class="form-control @error('respuesta1_2') is-invalid @enderror" id="respuesta1_2" name="respuesta1_2">
                @error('respuesta1_2')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Orden y aseo</label>
                <input type="text" class="form-control @error('respuesta1_3') is-invalid @enderror" id="respuesta1_3" name="respuesta1_3">
                @error('respuesta1_3')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Cumplimiento en requisitos</label>
                <input type="text" class="form-control @error('respuesta1_4') is-invalid @enderror" id="respuesta1_4" name="respuesta1_4">
                @error('respuesta1_4')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>2.</b> tuvo algun inconveniente durante la prestación del servicio</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <input type="text" class="form-control @error('respuesta2') is-invalid @enderror" id="respuesta2" name="respuesta2">
                @error('respuesta2')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>3.</b> Si la <u>respuesta 2</u> fue SI(1), describa la situación:</p>
            <div class="form-row">
                <div class="form-group col-md-12">
                <textarea class="form-control @error('respuesta3') is-invalid @enderror" id="respuesta3" name="respuesta3" placeholder="Ingresa las observaciones" ></textarea>
                @error('respuesta3')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <input type="text" class="form-control @error('respuesta4') is-invalid @enderror" id="respuesta4" name="respuesta4">
                @error('respuesta4')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>5.</b> Que aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado. </p>
            <div class="form-row">
                <div class="form-group col-md-12">
                <textarea class="form-control @error('respuesta5') is-invalid @enderror " id="respuesta5" name="respuesta5" placeholder="Ingresa las observaciones" ></textarea>
                @error('respuesta5')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>6.</b> Volvería Usted a Utilizar los servicios de VINICOL BOMBEOS</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <input type="text" class="form-control @error('respuesta6') is-invalid @enderror" id="respuesta6" name="respuesta6">
                @error('respuesta6')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <p><b>7.</b> Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <input type="text" class="form-control @error('respuesta7') is-invalid @enderror" id="respuesta7" name="respuesta7">
                @error('respuesta7')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar Encuesta</button>
    </form>
<br>

</body>
@endsection
