@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="card col-md-5">
                <div class="card-header ">
                    <strong>Cotizaciones por empresa</strong>
                </div>
                <div class="card-body">
                    @include('flash::message')
                    <form method="POST" action="/chart/valorCotizacion" id="form1">
                        @csrf
                            <div class="input-group">
                                <select class="custom-select" id="id" aria-label="Example select with button addon" name= "id">
                                    <option value="0">Seleccione una empresa</option>
                                    @foreach($empresa as $key =>$value)
                                    <option value="{{ $value->id }}">{{ $value->nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Generar graficos</button>
                                </div>
                            </div>
                            <label class="validacion" id="val_empresa"></label>
                    </form>
                </div>
        </div>
        <div class="form row">
            <div class="form group">
                <canvas id="myChart" width="800" height="400"></canvas>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header text-white float-right" style="background-color: #616A6B">
                <strong>Reporte</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="" align="center">
                        <tr>
                            <th>Cotizacion N°</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Empresa</th>
                            <th>Obra</th>
                        </tr>
                        <tbody id="tbody" class="" align="center">

                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>


@endsection
@section('style')
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var fechaCotizacion = [];
        var valorTotal = [];
        var id = [];
        var nombre_empresa = [];
        var nombre_obra = [];
        var colores = [];

        $(document).ready(function(){
            $("#form1").submit(function(event){
                event.preventDefault();

                let validado = 0;

                if($("#id").val()== 0){
                    $("#val_empresa").text("Debe seleccionar la Empresa");
                }
                else{
                    validado++;
                }

                console.log(validado);

                if(validado == 1)
                {
                $.ajax({
                url:'/chart/valorCotizacion',
                method: 'POST',
                data: {
                    id:$('select[name="id"]').val(),
                    _token:$('input[name="_token"]').val()
                }
                }).done(function(res){

                    var arreglo = JSON.parse(res);
                    for(var x= 0; x<arreglo.length;x++){
                        var todo = '<tr><td>'+arreglo[x].id+'</td>';
                        todo+='<td>'+arreglo[x].fechaCotizacion+'</td>';
                        todo+='<td>'+arreglo[x].valorTotal+'</td>';
                        todo+='<td>'+arreglo[x].nombre_empresa+'</td>';
                        todo+='<td>'+arreglo[x].nombre_obra+'</td></tr>';
                        $('#tbody').append(todo);
                        fechaCotizacion.push(arreglo[x].fechaCotizacion);
                        valorTotal.push(arreglo[x].valorTotal);
                        id.push(arreglo[x].id);
                        nombre_empresa.push(arreglo[x].nombre_empresa);
                        nombre_obra.push(arreglo[x].nombre_obra);
                        colores.push(colorRGB());
                    }
                    generarGrafica(nombre_obra,valorTotal,colores);
                    generarGrafica2(nombre_obra,valorTotal,colores);
                })
                $("#val_empresa").text("");
                }else{
                    //alert("Debe elegir Id.");
                    Swal.fire('Debe seleccionar una empresa');
                }
            })
        });



        function generarGrafica(nombre_obra, valortotal,colores){
            var ctx = document.getElementById('myChart').getContext('2d');

                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:nombre_obra,
                    datasets: [{
                        label: 'Valor cotizacion',
                        data: valortotal,
                        backgroundColor: colores,
                        borderColor: colores,
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function generarNumero(numero){
            return (Math.random()*numero).toFixed(0);
        }

        function colorRGB(){
            var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
            return "rgb" + coolor;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>

@endsection
