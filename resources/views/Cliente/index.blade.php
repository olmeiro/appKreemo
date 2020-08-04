@extends('layouts.app')

@section('body')
<div class="container">
<h1 align="center"><b>LISTADO DE CONTACTO</b></h1>
    <a class="btn btn-danger" href="{{route('Cliente.contacto')}}">CREAR CONTACTO</a>
    <a class="btn btn-danger" href="">CREAR OBRA</a>

         <table class="table table-striped" >
            <thead class="thead-light" align="center">
            <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>NIT</th>
            <th>Nombre</th>
            <th>Apellido1</th>
            <th>Apellido2</th>
            <th>Documento</th>
            <th>Estado</th>
            <th>Teléfono1</th>
            <th>Teléfono2</th>
            <th>Correo1</th>
            <th>Correo2</th>
            <th>Accion</th> 
            </tr>
            </thead>
         </table>
</div>
           
@endsection