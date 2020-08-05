@extends('layouts.app')

@section('body')

<ul class="nav nav-fill">
            <li class="nav-item">
                <a class="btn btn-danger" href="{{route('Encuesta.create')}}">Crear Encuesta</a>
            </li>
</ul>

<h1>Hola Encuesta</h1>

<div class="class-responsive">
            <table class="table table-striped table-responsive"" >
                <thead class="thead-light" align="center">
                <tr>
                <th>N° Encuesta</th>
                <th>Nombre de la obra</th>
                <th>Celular</th>
                <th>Ciudad</th>
                <th>Fecha</th>
                <th>Resp 1</th>
                <th>Resp 2</th>
                <th>Resp 3</th>
                <th>Resp 4</th>
                <th>Resp 5</th>
                <th>Resp 6</th>
                <th>Resp 7</th>
                <th>Accion</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


</body>
@endsection
