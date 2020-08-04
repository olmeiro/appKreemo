@extends('layouts.app')

@section('body')
<div class="container">

    <h1 align="center">Crear Cotización</h1>
    <br>
    <form class="form-signin col-md-12" action="../Controlador/ControladorCotizacion.php" method="post" id="FrmCrearCotizacion" name="FrmCrearCotizacion">

        <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="">Empresa</label>
                <label class="validacion" id="validacion_empresa"></label>
                <select id="IdEmpresa"  name= "IdEmpresa" class="form-control">
                    <option value="0" >Seleccione una Empresa</option>

                </select>
                <label class="validacion" id="validacion_empresa2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Estado</label>
                <label class="validacion" id="validacion_Estado"></label>
                <select id="IdEstado"  name= "IdEstado" class="form-control">
                    <option value="0" >Seleccione un Estado</option>

                </select>
                <label class="validacion" id="validacion_Estado2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Modalidad</label>
                <label class="validacion" id="validacion_Modalidad"></label>
                <select id="IdModalidad"  name= "IdModalidad" class="form-control">
                    <option value="0" >Seleccione un Modalidad</option>

                </select>
                <label class="validacion" id="validacion_Modalidad2"></label>
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="">Etapa</label>
                <label class="validacion" id="validacion_etapa"></label>
                <select id="IdEtapa"  name= "IdEtapa" class="form-control">
                        <option value="0" >Seleccione una Etapa</option>

                </select>
                <label class="validacion" id="validacion_etapa2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Jornada</label>
                <label class="validacion" id="validacion_jornada"></label>
                <select id="IdJornada"  name= "IdJornada" class="form-control">
                        <option value="0" >Seleccione un Jornada</option>

                </select>
                <label class="validacion" id="validacion_jornada2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Tipo de Concreto</label>
                <label class="validacion" id="validacion_TipoConcreto"></label>
                <select id="IdTipoConcreto"  name= "IdTipoConcreto" class="form-control">
                    <option value="0" >Seleccione un tipo de concreto</option>

                </select>
                <label class="validacion" id="validacion_TipoConcreto2"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">Fecha de Cotización</label>
                <label class="validacion" id="validacion_fechaCotizacion"></label>
                <input type="date" class="form-control" id="FechaCotizacion" name="FechaCotizacion" >
                <label class="validacion" id="validacion_fechaCotizacion2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Fecha de Inicio Bombeo</label>
                <label class="validacion" id="validacion_fechaBombeo"></label>
                <input type="date" class="form-control" id="FechaBombeo" name="FechaBombeo" >
                <label class="validacion" id="validacion_fechaBombeo2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Ciudad</label>
                <label class="validacion" id="validacion_Ciudad"></label>
                <input type="text" class="form-control" id="Ciudad" name="Ciudad">
                <label class="validacion" id="validacion_Ciudad2"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">Cantidad de losas</label>
                <label class="validacion" id="validacion_losas"></label>
                <input type="text" class="form-control" id="Losas" name="Losas">
                <label class="validacion" id="validacion_losas2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Cantidad de tuberia</label>
                <label class="validacion" id="validacion_tuberia"></label>
                <input type="text" class="form-control" id="Tuberia" name="Tuberia">
                <label class="validacion" id="validacion_tuberia2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">Cantidad de metros<sup>3</sup></label>
                <label class="validacion" id="validacion_CantidadMetros"></label>
                <input type="text" class="form-control" id="Metros" name="Metros">
                <label class="validacion" id="validacion_CantidadMetros2"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">Valor Metro <sup>3</sup></label>
                <label class="validacion" id="validacion_ValorMetro"></label>
                <input type="text" class="form-control  solo_numeros" id="Valor_Metro" name="Valor_Metro" >
                <label class="validacion" id="validacion_ValorMetro2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="">AIU</label>
                <label class="validacion" id="validacion_AIU"></label>
                <input type="text" class="form-control solo_numeros" id="AIU" name="AIU" readonly>
                <label class="validacion" id="validacion_AIU2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">SubTotal</label>
                <label class="validacion" id="validacion_ValorSubTotal"></label>
                <input type="text" class="form-control solo_numeros" id="Valor_SubTotal" name="Valor_SubTotal" readonly>
                <label class="validacion" id="validacion_ValorSubTotal2"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">IVA al AIU</label>
                <label class="validacion" id="validacion_ValorIvaAiu"></label>
                <input type="text" class="form-control  solo_numeros" id="Valor_IvaAiu" name="Valor_IvaAiu" readonly>
                <label class="validacion" id="validacion_ValorIvaAiu2"></label>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Valor Total</label>
                <label class="validacion" id="validacion_ValorTotal"></label>
                <input type="text" class="form-control solo_numeros" id="Valor_Total" name="Valor_Total" readonly>
                <label class="validacion" id="validacion_ValorTotal2"></label>
            </div>
        </div>
         <div class="mb-3">
              <label for="validationTextarea">Observaciones</label>
              <label class="validacion" id="validacion_Observa"></label>
                   <textarea class="form-control " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
                   <label class="validacion" id="validacion_Observa2"></label>
         </div>
         <input type="hidden" name="Crear" id="Crear">
         <button type="submit" class="btn btn-primary">Crear Cotizacion</button>
         </form>
         <br>
         <div align="center">
         <a href="ListarCotizacion.php" class="btn btn-outline-primary" >Volver</a>
         </div>
</div>
<br>

</body>
@endsection
