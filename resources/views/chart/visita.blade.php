@extends('layouts.app')

@section('body')
    <div class="container">

        <div class="form row">
            <!-- <div class="form group col-md-6">
                <canvas id="myChart" width="200" height="200"></canvas>
            </div> -->
            <div class="form group col-md-6">
                <canvas id="myChart1" width="200" height="200"></canvas>
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
                            <th>id</th>
                            <th>viabilidad</th>
                            <th>id visita</th>
                            <th>numero planilla</th>
                            <th>Nombre obra</th>
                        </tr>
                        <tbody id="tbody" class="" align="center">

                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>

        var id = [];
        var viabilidad = [];
        var idvisita = [];
        var numeroplanilla = [];
        var nombre_obra = [];
        var colores = [];
        var sumasi=0;
        var sumano=0;

        $(document).ready(function(){
            $.ajax({
                url:'/chart/visita',
                method: 'POST',
                data: {

                    _token:$('input[name="_token"]').val()
                }
            }).done(function(res){
                var arreglo = JSON.parse(res);
                for(var x= 0; x<arreglo.length;x++){
                    var todo = '<tr><td>'+arreglo[x].id+'</td>';
                    todo+='<td>'+arreglo[x].viabilidad+'</td>';
                    todo+='<td>'+arreglo[x].idvisita+'</td>';
                    todo+='<td>'+arreglo[x].numeroplanilla+'</td>';
                    todo+='<td>'+arreglo[x].nombre_obra+'</td></tr>';
                    $('#tbody').append(todo);
                    viabilidad.push(arreglo[x].viabilidad);
                    idvisita.push(arreglo[x].idvisita);
                    id.push(arreglo[x].id);
                    numeroplanilla.push(arreglo[x].numeroplanilla);
                    colores.push(colorRGB());
                    if (arreglo[x].viabilidad == "SI") {
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
        //             labels:['SI','NO'],
        //             datasets: [{
        //                 label: 'Viabilidad',
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
                    labels:['SI','NO'],
                    datasets: [{
                        label: 'Viabilidad',
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
