@extends('layouts.app')

@section('body')
    <div class="container">
                <div class="card col-md-5">
                    <div class="card-header ">
                        <strong>Inconvenientes en el servicio</strong>
                    </div>
                    <div class="card-body">
                        @include('flash::message')
                        <form method="POST" action="/chart/encuesta" id="form1">
                            @csrf
                                <div class="input-group">
                                    <select class="custom-select" id="id" aria-label="Example select with button addon" name= "id">
                                    <option selected>Seleccione la respuesta</option>
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>
                                            </select>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Generar graficos</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

        <div class="form row">
            <div class="form group col-md-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="form group col-md-6">
                <canvas id="myChart1" width="400" height="400"></canvas>
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
                            <th>N° Servicio</th>
                            <th>Nombre Director</th>
                            <th>Constructora</th>
                            <th>Tuvo Inconveniente</th>
                            <th>Descripción</th>
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
        var idservicio = [];
        var directorobra = [];
        var constructora = [];
        var respuesta2 = [];
        var respuesta3 = [];
        var id =[];
        var colores = [];

        $(document).ready(function(){
            $("#form1").submit(function(event){
                event.preventDefault();

                let validado = 0;

                if($("#id").val()== 0){
                    alert("Elija una opción");
                }
                else{
                    validado++;
                }

                console.log(validado);

                if(validado == 1)
                {
                $.ajax({
                url:'/chart/encuesta',
                method: 'POST',
                data: {
                    id:$('select[name="id"]').val(),
                    _token:$('input[name="_token"]').val()
                }
            }).done(function(res){


                var arreglo = JSON.parse(res);
                for(var x= 0; x<arreglo.length;x++){
                    var
                    todo = '<tr><td>'+arreglo[x].id+'</td>';
                    todo+='<td>'+arreglo[x].idservicio+'</td>';
                    todo+='<td>'+arreglo[x].directorobra+'</td>';
                    todo+='<td>'+arreglo[x].constructora+'</td>';
                    todo+='<td>'+arreglo[x].respuesta2+'</td>
                    todo+='<td>'+arreglo[x].respuesta3+'</td></tr>';
                    $('#tbody').append(todo);
                    id.push(arreglo[x].id);
                    idservicio.push(arreglo[x].idservicio);
                    directorobra.push(arreglo[x].directorobra);
                    constructora.push(arreglo[x].constructora);
                    respuesta2.push(arreglo[x].respuesta2);
                    respuesta3.push(arreglo[x].respuesta3);
                    colores.push(colorRGB());
                }
                generarGrafica(idservicio,directorobra,constructora,respuesta2,respuesta3);
                generarGrafica2(idservicio,directorobra,constructora,respuesta2,respuesta3);
            })
                }else{
                    alert("Debe elegir una opción.");
                }
            })
        });



        function generarGrafica(idservicio,directorobra,constructora,respuesta2,respuesta3){
            var ctx = document.getElementById('myChart').getContext('2d');
            if (window.grafica) {
                    window.grafica.clear();
                    window.grafica.destroy();
                }
            window.grafica = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:idservicio,
                    datasets: [{
                        label: 'Id servicio',
                        data: idservicio,
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

        function generarGrafica2(idservicio,directorobra,constructora,respuesta2,respuesta3){
            var ctx = document.getElementById('myChart1').getContext('2d');
            if (window.grafic) {
                    window.grafic.clear();
                    window.grafic.destroy();
                }
            window.grafic = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: idservicio,
                    datasets: [{
                        label: '# of Votes',
                        data: idservicio,
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
