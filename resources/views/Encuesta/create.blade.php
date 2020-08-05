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
                <label class="validacion" id="validacion_obra"></label>
                <select id="IdObra"  name= "IdObra" class="form-control">
                <option value="0" >Seleccione una Empresa</option>
                </select>
                <label class="validacion" id="validacion_obra"></label>
            </div>
            <div class="form-group col-md-6">
                <label for="">Celular</label>
                <label class="validacion" id="validacion_celular"></label>
                <input type="tel" class="form-control" id="celular" name="celular" placeholder="Ejm: 3212345678">
                <label class="validacion" id="validacion_celular"></label>
            </div>
            </div>
            <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="">Ciudad</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ejm: Medellín">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
            <div class="form-group col-md-6">
                <label for="">Fecha</label>
                <label class="validacion" id="validacion_fecha"></label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" >
                <label class="validacion" id="validacion_fecha"></label>
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
                <label class="validacion" id="validacion_puntualidad"></label>
                <input type="text" class="form-control" id="puntualidad" name="puntualidad">
                <label class="validacion" id="validacion_puntualidad"></label>
            </div>
            <div class="form-group col-md-3">
                <label for="">Solución de problemas</label>
                <label class="validacion" id="validacion_problemas"></label>
                <input type="text" class="form-control" id="problemas" name="problemas">
                <label class="validacion" id="validacion_problemas"></label>
            </div>
            <div class="form-group col-md-3">
                <label for="">Orden y aseo</label>
                <label class="validacion" id="validacion_aseo"></label>
                <input type="text" class="form-control" id="aseo" name="aseo">
                <label class="validacion" id="validacion_aseo"></label>
            </div>
            <div class="form-group col-md-3">
                <label for="">Cumplimiento en requisitos</label>
                <label class="validacion" id="validacion_requisitos"></label>
                <input type="text" class="form-control" id="requisitos" name="requisitos">
                <label class="validacion" id="validacion_requisitos"></label>
            </div>
            </div>
                <p><b>2.</b> tuvo algun inconveniente durante la prestación del servicio</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_p2"></label>
                <input type="text" class="form-control" id="p2" name="p2">
                <label class="validacion" id="validacion_p2"></label>
            </div>
            </div>
                <p><b>3.</b> Si la <u>respuesta 2</u> fue SI(1), describa la situación:</p>
            <div class="form-row">
            <div class="form-group col-md-12">
            <label class="validacion" id="validacion_p3"></label>
            <textarea class="form-control " id="p3" name="p3" placeholder="Ingresa las observaciones" ></textarea>
            <label class="validacion" id="validacion_Observa2"></label>
            </div>
            </div>
                <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_p4"></label>
                <input type="text" class="form-control" id="p4" name="p4">
                <label class="validacion" id="validacion_p4"></label>
            </div>
            </div>
                <p><b>5.</b> Que aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado. </p>
            <div class="form-row">
            <div class="form-group col-md-12">
            <label class="validacion" id="validacion_p5"></label>
            <textarea class="form-control " id="p5" name="p5" placeholder="Ingresa las observaciones" ></textarea>
            <label class="validacion" id="validacion_p5"></label>
            </div>
            </div>
                <p><b>6.</b> Volvería Usted a Utilizar los servicios de VINICOL BOMBEOS</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_p6"></label>
                <input type="text" class="form-control" id="p6" name="p6">
                <label class="validacion" id="validacion_p6"></label>
            </div>
            </div>
                <p><b>7.</b> Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">SI(1) - NO(2)</label>
                <label class="validacion" id="validacion_p7"></label>
                <input type="text" class="form-control" id="p7" name="p7">
                <label class="validacion" id="validacion_p7"></label>
            </div>
            </div>
        </div>
<br>

</body>
@endsection
