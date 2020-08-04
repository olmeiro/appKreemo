@extends('layouts.app')

@section('body')
    
<div class="container">

<h1 align="center">CREAR CONTACTO</h1>
<form class="form-signin col-md-12" action="" method="post" id="FrmCrearCliente" name="FrmCrearCliente">

<div class="form-row" align="center" >
       <div class="form-group col-md-4">
                    <label for="">Tipo Contacto</label>
                    <select id="Tipo"  name= "TipoC" class="form-control">
                            <option value="0" >Seleccione</option>
                    </select>
         </div>
         <div class="form-group col-md-4">
                <label for="">NIT</label>
                <input type="text" class="form-control" id="NIT" name="NIT" >
         </div>
        <div class="form-group col-md-4">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" >
         </div>

         <div class="form-group col-md-4">
                <label for="">Apellido 1</label>
                <input type="text" class="form-control" id="Apellido1" name="Apellido1" >
         </div>

         <div class="form-group col-md-4">
                <label for="">Apellido 2</label>
                <input type="text" class="form-control" id="Apellido2" name="Apellido2" >
         </div>

         <div class="form-group col-md-4">
                <label for="">Documento</label>
                <input type="text" class="form-control" id="Apellido2" name="Apellido2" >
         </div>
         <div class="form-group col-md-4">
                <label for="">Teléfono 1</label>
                <input type="text" class="form-control" id="Telefono1" name="Telefono1" >
         </div>
         <div class="form-group col-md-4">
                <label for="">Teléfono 2</label>
                <input type="text" class="form-control" id="Telefono2" name="Telefono2" >
         </div>
         <div class="form-group col-md-4">
                <label for="">Correo 1</label>
                <input type="text" class="form-control" id="Correo" name="Correo" >
         </div>
         <div class="form-group col-md-4">
                <label for="">Correo 2</label>
                <input type="text" class="form-control" id="Correo" name="Correo" >
         </div>
</div>
       <div align="center">
            <button type="submit" class="btn btn-primary">CREAR</button>

    </div>
</form>
</div>


@endsection