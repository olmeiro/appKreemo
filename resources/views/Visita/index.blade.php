@extends('layouts.app')

@section('body')
<div class="container">

    <h1 align="center">Crear Cita</h1>

    <form class="form-signin col-md-12" action="" method="post" id="FrmCrearCita" name="FrmCrearCita">

    <div class="form-row" align="center" >
        <div class="form-group col-md-4">
                    <label for="">Obra</label>
                    <label class="validacion" id="validacion_empresa"></label>
                    <select id="IdObra"  name= "IdObra" class="form-control">
                            <option value="0" >Seleccione una obra</option>
                    </select>
                    <label class="validacion" id="validacion_obra"></label>
         </div>
         <div class="form-group col-md-4">
                    <label for="">Tipo de Visita</label>
                    <label class="validacion" id="validacion_empresa"></label>
                    <select id="IdTvisita"  name= "IdTvisita" class="form-control">
                            <option value="0" >Tipo de visita</option>
                    </select>
                    <label class="validacion" id="validacion_Tvisita"></label>
         </div>
         <div class="form-group col-md-4">
                    <label for="">Encargado</label>
                    <input type="text" class="form-control" id="Encargado" name="Encargado" >
                    <label class="validacion" id="validacion_Evisita"></label>
         </div>
         <div class="form-group col-md-4">
                    <label for="">Fecha</label>
                    <input type="date" class="form-control" id="FechaV" name="FechaV" >
                    <label class="validacion" id="validacion_Fvisita"></label>
         </div>
         <div class="form-group col-md-4">
                    <label for="">Enviar correo de notificación</label>
                    <br>
                    <input type="checkbox" class="form-check-input" id="FechaV" name="FechaV" >
                    <label class="validacion" id="validacion_Fvisita"></label>
         </div>
    </div>
    <div align="center">
            <input type="hidden" name="Crear" id="Crear">
            <button type="submit" class="btn btn-primary">Crear Cita</button>
            <button type="button" class="btn btn-dark">Volver</button>
    </div>
    </form>
    <br>
</div>

@endsection