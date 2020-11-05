<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kreemo</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/landing/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
    </head>
    <body id="page-top" onload="mensaje_index()">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login">Ingresar</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/register">Registrar</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/home">Ir a Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <hr class="divider my-4"/>
                    </div>
                </div>
            </div>
        </header>
        @yield('contenido')
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Kreemo App</div></div>
        </footer>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('assets/landing/js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
        
        {{-- <script>
function mensaje_index()
{
    Swal.fire({
        title:'Bienvenido ',
        text:'Ingresaste a Sistema de Información Bombeos',
        footer:'<span class="validacion">KREEMO',
        padding:'1rem',
        backdrop:true,
        position:'center',
        allowOutsideClick:true,
	    allowEscapeKey:true,
	    allowEnterKey:true,
        imageUrl:'/public/assets/landing/img/kreemo.png',
        imageWidth:'80px',
        imageAlt:'Logo Kreemo',
        });
}
        </script> --}}

    </body>
</html>
