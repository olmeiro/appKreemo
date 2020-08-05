@extends('layouts.app')

@section('body')
<div class="container">
        <h4 align="center"><b>LISTADO DE COTIZACIONES</b></h4>
        <br>
        <ul class="nav nav-fill">
            <li class="nav-item">
                <a class="btn btn-danger" href="{{route('Cotizacion.create')}}">CREAR COTIZACIÓN</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger" href=""><i class="fas fa-file-pdf"> </i> GENERAR REPORTE</a>
        </ul>
        <br>
        <div class="class-responsive">
            <table class="table table-striped table-responsive"" >
                <thead class="thead-light" align="center">
                <tr>
                <th>Cotizacion N°</th>
                <th>Empresa</th>
                <th>Estado</th>
                <th>Modalidad</th>
                <th>Etapa</th>
                <th>Jornada</th>
                <th>Tipo Concreto</th>
                <th>Fecha Cotización</th>
                <th>Fecha Inicio Bombeo</th>
                <th>Ciudad</th>
                <th>Cantidad de losas</th>
                <th>Cantidad de tuberia</th>
                <th>Cantidad de Metros </th>
                <th>Valor del Metro </th>
                <th>AIU</th>
                <th>Subtotal</th>
                <th>IVA al AIU</th>
                <th>Valor Total</th>
                <th>Observaciones</th>
                <th>Accion</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
