@extends('layouts.app')

@section('body')
<div class="container">

    <h1 align="center">Encuesta</h1>
    <br>
    <form class="form-signin col-md-12" action="../Controlador/Controlador.php" method="post" id="FrmCrear" name="FrmCrear">
        <h2>Información del cliente</h2>

        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="">Nombre de la obra</label>
                <label class="validacion" id="validacion_empresa"></label>
                <select id="IdEmpresa"  name= "IdEmpresa" class="form-control">
                <option value="0" >Seleccione una Empresa</option>
                </select>
                <label class="validacion" id="validacion_empresa2"></label>
            </div>
            <div class="form-group col-md-6">
                <label for="">Celular</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            </div>
            <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="">Ciudad</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            <div class="form-group col-md-6">
                <label for="">Fecha</label>
                <label class="validacion" id="validacion_fechaBombeo"></label>
                <input type="date" class="form-control" id="FechaBombeo" name="FechaBombeo" >
                <label class="validacion" id="validacion_fechaBombeo2"></label>
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
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            <div class="form-group col-md-3">
                <label for="">Solución de problemas</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            <div class="form-group col-md-3">
                <label for="">Orden y aseo</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            <div class="form-group col-md-3">
                <label for="">Cumplimiento en requisitos</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            </div>
                <p><b>2.</b> tuvo algun inconveniente durante la prestación del servicio</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            </div>
                <p><b>3.</b> Si la <u>respuesta 2</u> fue SI(1), describa la situación:</p>
            <div class="form-row">
            <div class="form-group col-md-12">
            <label class="validacion" id="validacion_Observa"></label>
            <textarea class="form-control " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
            <label class="validacion" id="validacion_Observa2"></label>
            </div>
            </div>
                <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            </div>
                <p><b>5.</b> Que aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado. </p>
            <div class="form-row">
            <div class="form-group col-md-12">
            <label class="validacion" id="validacion_Observa"></label>
            <textarea class="form-control " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
            <label class="validacion" id="validacion_Observa2"></label>
            </div>
            </div>
                <p><b>6.</b> Volvería Usted a Utilizar los servicios de VINICOL BOMBEOS</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            </div>
                <p><b>7.</b> Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            </div>
        </div>
<br>

</body>
@endsection
