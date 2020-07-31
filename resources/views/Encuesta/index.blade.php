@extends('layouts.app')

@section('body')
<body style="background-color: rgb(0, 0, 0);">
    <div style="background-color: #B52407;" class="card text-white mb-3">
        <div class="card-header">Ingrese los datos para la encuesta</div>
        <div class="card-body">
    <form id="FrmEncuesta" name="FrmEncuesta" action="registrar_encuesta.php" method="POST">
        <div class="form-group"style="text-align:center;">
        Nombre de la obra:
        <br>
        <input title="escriba aca el nombre de la empresa" type="text" id="nombreempresa" name="nombreempresa"/>
        <label id="validacion_nombreempresa"></label>
        <br>
        </div>
        <div class="form-group"style="text-align:center;">
          Celular:
          <br>
          <input type="tel" id="phone" name="phone"/>
          <label id="validacion_celular"></label>
          <br>
        </div>
        <div class="form-group"style="text-align:center;">
            Director de la obra:
            <br>
            <input type="text" id="directorobra" name="directorobra"/>
            <label id="validacion_directorobra"></label>
            <br>
        </div>
          <div class="form-group"style="text-align:center;">
            Constructora:
            <br>
            <input type="text" id="constructora" name="constructora"/>
            <label id="validacion_constructora"></label>
            <br>
          </div>
          <div class="form-group"style="text-align:center;">
            Mes:
            <br>
            <input type="text" id="mes" name="mes"/>
            <label id="validacion_mes"></label>
            <br>
          </div>
          -----------------------------------------------------
          <br>
          <div class="form-group"style="text-align:center;">
            1. Califique de 1 a 5 los siguientes aspectos prestados por Vinicol Bombeos
            <br>
            <br>
            Puntualidad
            <br>
            <input type="text" id="puntualidad" name="puntualidad"/>
            <label id="validacion_puntualidad"></label>
            <br>
            <br>
            Solucion de problemas
            <br>
            <input type="text" id="solucionproblemas" name="solucionproblemas"/>
            <label id="validacion_solucionproblemas"></label>
            <br>
            <br>
            Orden y aseo
            <br>
            <input type="text" id="ordenaseo" name="ordenaseo"/>
            <label id="validacion_ordenaseo"></label>
            <br>
            <br>
            Cumplimiento en requisitos
            <br>
            <input type="text" id="requisitos" name="requisitos"/>
            <label id="validacion_requisitos"></label>
            <br>
        </div>
        -----------------------------------------------------
        <br>
        <div class="form-group"style="text-align:center;">
            2. tuvo algun inconveniente durante la prestación del servicio
            <br>
            <br>
            SI (1) - NO (2)
            <br>
            <input type="number" id="pregunta2" name="pregunta2"/>
            <label id="validacion_pregunta2"></label>
            <br>
            <br>
            3. Si la respuesta 2 fue si (1), describa la situación:
            <br>
            <textarea name="descripcionp3" id="descripcionp3" rows="5"></textarea>
            <label id="validacion_descripcionp3"></label>
            <br>
        </div>
        -----------------------------------------------------
        <br>
        <div class="form-group"style="text-align:center;">
            4. El trato  que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable  y se ajusta a lo que  usted espera  como cliente.
            <br>
            <br>
            SI (1) - NO (2)
            <br>
            <input type="number" id="pregunta4" name="pregunta4"/>
            <label id="validacion_pregunta4"></label>
            <br>
            5. Que aspectos considera usted que deban mejorar  en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado.
            <br>
            <textarea name="descripcionp5" id="descripcionp5" rows="5"></textarea>
            <label id="validacion_descripcionp5"></label>
            <br>
        </div>
        -----------------------------------------------------
        <br>
        <div class="form-group"style="text-align:center;">
            6. Volvería  Usted  a Utilizar los servicios de VINICOL BOMBEOS
            <br>
            <br>
            SI (1) - NO (2)
            <br>
            <input type="number" id="pregunta6" name="pregunta6"/>
            <label id="validacion_pregunta6"></label>
            <br>
        </div>
        -----------------------------------------------------
        <br>
        <div class="form-group"style="text-align:center;">
            7.Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?
            <br>
            <br>
            SI (1) - NO (2)
            <br>
            <input type="number" id="pregunta7" name="pregunta7"/>
            <label id="validacion_pregunta7"></label>
            <br>
        </div>

        <button  class="btn btn-secondary" name="btnregistrar" id="btnregistrar_encuesta">Registrar</button>
        <button  class="btn btn-secondary" name="btnlimpiar" id="btnlimpiar">Limpiar</button>
        <button  class="btn btn-secondary" name="btnconsultar" id="btnconsultar_encuesta">Consultar</button>
        <button  class="btn btn-secondary" name="btnVolver" id="btnVolver" onclick="location.href='index.html'"> Volver</button>

    </form>

    <p align="center" id="RespuestaTransaccion">Utilice el boton registrar para saber si el envio de datos fue exitosa o no</p>

    <footer>
        <div class="footer" style="margin-top: 5rem; color: black;">
            <i><b>GIVER CIFUENTES</b></i>
        </div>
    </footer>
</div>
</div>
</body>
@endsection
