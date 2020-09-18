<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .page-break {
            page-break-after: always;
        }

        /* .titulo{
            border:2px solid #616A6B;
            /* border-radius: 15px; */
            padding: 10px;
            background-color: red;
        } */

        .titulo h1{
            text-align:  center;
        }
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            background-color: #860606;
            color: white;
            padding: 10px;
            /* text-align: center; */
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #860606;
            color: white;
            text-align: center;
            line-height: 35px;
        }


    </style>

</head>
<body>
    <header class="titulo">
        <h1>Informe de Cotización</h1>
        <p>Cotización N° {{$input["txtNumeroCotizacion"]}}</p>
    </header>
    <h1>Señores</h1>
    <footer>
        <h1>Vinicol</h1>
    </footer>
    <div class="page-break"></div>


    <footer>
        <h1>Vinicol</h1>
    </footer>
    <div class="page-break"></div>


    <footer>
        <h1>Vinicol</h1>
    </footer>
</body>
</html>
