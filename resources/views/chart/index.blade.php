@extends('layouts.app')

@section('body')
    <div class="container">
 
        <div class="form row">
            <div class="form group col-md-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="form group col-md-6">
                <canvas id="myChart1" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <form action="POST" action="/chart/estadosCotizacion" id="form1">
        @csrf   
        <!-- <input type="hidden" name="id" value="1">
        <input type="email"> -->
    </form>

    <table class="table col-12">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>estado</th>
            </tr>
            <tbody id="tbody">

            </tbody>
        </thead>
    </table>

    
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var fechaCotizacion = [];
        var valorTotal = [];

        $(document).ready(function(){
            $.ajax({
                url:'/chart/valorCotizacion',
                method: 'POST',
                data: {
                    id:1,
                    _token:$('input[name="_token"]').val()
                }
            }).done(function(res){
                var arreglo = JSON.parse(res);
                for(var x= 0; x<arreglo.length;x++){
                    var todo = '<tr><td>'+arreglo[x].id+'</td>';
                    todo+='<td>'+arreglo[x].fechaCotizacion+'</td>';
                    todo+='<td>'+arreglo[x].valorTotal+'</td>';
                    todo+='<td></td></tr>';
                    $('#tbody').append(todo);
                    fechaCotizacion.push(arreglo[x].fechaCotizacion);
                    valorTotal.push(arreglo[x].valorTotal)
                }
                generarGrafica();
            })
        });
        

        function generarGrafica(){
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: fechaCotizacion,
                    datasets: [{
                        label: 'Cotizaciones Realizadas',
                        data: valorTotal,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
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

            var ctx = document.getElementById('myChart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
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
    </script>
@endsection