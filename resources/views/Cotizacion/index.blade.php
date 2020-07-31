@extends('layouts.app')

@section('body')
    <p>Cotizacion</p>
    <div class="container">

        <h1 align="center">cotizacion</h1>
        <br>
        <form class="form-signin col-md-12" action="../Controlador/ControladorCotizacion.php" method="post" id="FrmCrearCotizacion" name="FrmCrearCotizacion">

             <div class="form-row" >
                  <div class="form-group col-md-8">
                       <label for="">Empresa</label>
                       <label class="validacion" id="validacion_empresa"></label>
                       <select id="IdEmpresa"  name= "IdEmpresa" class="form-control">
                            <option value="0" >Seleccione una Empresa</option>

                       </select>
                       <label class="validacion" id="validacion_empresa2"></label>
                  </div>
             </div>
             <div class="form-row" >
                  <div class="form-group col-md-8">
                       <label for="">Estado</label>
                       <label class="validacion" id="validacion_Estado"></label>
                       <select id="IdEstado"  name= "IdEstado" class="form-control">
                            <option value="0" >Seleccione un Estado</option>

                       </select>
                       <label class="validacion" id="validacion_Estado2"></label>
                  </div>
                  <div class="form-group col-md-4">
                       <label for="inputPassword4">Metros m<sup>3</sup></label>
                       <label class="validacion" id="validacion_MetrosCubicos"></label>
                       <input type="text" class="form-control solo_numeros" id="Metros_Cubicos" name="Metros_Cubicos">
                       <label class="validacion" id="validacion_MetrosCubicos2"></label>
                  </div>
             </div>
             <div class="form-row">
                  <div class="form-group col-md-4">
                       <label for="">Valor Metro <sup>3</sup></label>
                       <label class="validacion" id="validacion_ValorMetro"></label>
                       <input type="text" class="form-control  solo_numeros" id="Valor_Metro" name="Valor_Metro" onchange="valor_Total()">
                       <label class="validacion" id="validacion_ValorMetro2"></label>
                  </div>
                  <div class="form-group col-md-4">
                       <label for="">IVA</label>
                       <label class="validacion" id="validacion_Iva"></label>
                       <input type="text" class="form-control solo_numeros" id="Iva" name="Iva" readonly>
                       <label class="validacion" id="validacion_Iva2"></label>
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

@endsection
