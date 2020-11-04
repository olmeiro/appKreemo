@extends('layouts.app')

@section('body')
    <div class="container">

        <div class="form row">
            <!-- <div class="form group col-md-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div> -->
            <div class="form group">
                <canvas id="myChart1" width="300" height="300"></canvas>
            </div>
        </div>

        <form action="POST" action="/chart/estadosCotizacion" id="form1">
            @csrf
            <!-- <input type="hidden" name="id" value="1">
            <input type="email"> -->
        </form>

        <br>
        <div class="card">
            <div class="card-header text-white float-right" style="background-color: #616A6B">
                <strong>Reporte</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="" align="center">
                        <tr>
                            <th>N° Empresa</th>
                            <th>Nombre empresa</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                        </tr>
                        <tbody id="tbody" class="" align="center">

                        </tbody>
                    </thead>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var id = [];
        var nombre = [];
        var telefono1 = [];
        var estado = [];
        var colores = [];
        var sumasi = 0;
        var sumano = 0;

        $(document).ready(function(){

                $.ajax({
                url:'/chart/clienteai',
                method: 'POST',
                data: {
                    _token:$('input[name="_token"]').val()
                }
            }).done(function(res){
                var arreglo = JSON.parse(res);
                for(var x= 0; x<arreglo.length;x++){
                    var todo ='<tr><td>'+arreglo[x].id+'</td>';
                    todo+='<td>'+arreglo[x].nombre+'</td>';
                    todo+='<td>'+arreglo[x].telefono1+'</td>';
                    todo+='<td>'+arreglo[x].estado+'</td></tr>';
                    $('#tbody').append(todo);
                    id.push(arreglo[x].id);
                    nombre.push(arreglo[x].nombre);
                    telefono1.push(arreglo[x].telefono1);
                    estado.push(arreglo[x].estado);
                    colores.push(colorRGB());
                    if (arreglo[x].estado == 0) {
                        sumasi +=1;
                    }else {
                        sumano +=1;
                    }
                }
                generarGrafica();
                generarGrafica2();
            })
        });



        // function generarGrafica(){
        //     var ctx = document.getElementById('myChart').getContext('2d');
        //     var myChart = new Chart(ctx, {
        //         type: 'bar',
        //         data: {
        //             labels:['Pasivo','Activo'],
        //             datasets: [{
        //                 label: 'Estado de la empresa',
        //                 data: [sumasi,sumano ],
        //                 backgroundColor: colores,
        //                 borderColor: colores,
        //                 borderWidth: 2
        //             }]
        //         },
        //         options: {
        //             scales: {
        //                 yAxes: [{
        //                     ticks: {
        //                         beginAtZero: true
        //                     }
        //                 }]
        //             }
        //         }
        //     });
        // }

        function generarGrafica(){
            var ctx = document.getElementById('myChart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels:['Pasivo','Activo'],
                    datasets: [{
                        label: 'Estado de la empresa',
                        data: [sumasi,sumano ],
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
@endsection
