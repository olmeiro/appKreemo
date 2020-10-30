@extends('layouts.app')


@section('body')

<body>
<div class="container">
    <h4 align="center">Manual de usuario</h4>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Módulos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/manual/usuarios">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/clientes">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/visitas">Visitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/cotizacion">Cotización</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/maquinaria">Maquinaria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/encuesta">Encuesta</a>
            </li>
            </ul>
        </div>
        </nav>
        @yield("body2")
        <div style="max-width: 100%; width: 800px; margin: 0 auto;">              <h3 style="display: none; font-size: 15px; line-height: 23px; text-align: center; margin-top: 10px; font-weight: 600">Ingrese el correo electr&oacute;nico</h3>                  <div style="display: none;">                  <p style="display: none; text-align: center; margin-top: 10px;">            <i style="font-style: italic; font-weight: bold; color: #CCCCCC; font-size: 18px;">4 STEPS</i>          </p>                      <p style='font-size: 15px; line-height: 136%; margin-top: 59px; margin-bottom: 51px;'>        1. Para iniciar la aplicación <b style="font-weight:normal;color:#FF00D6">Kreemo</b> debe dar clic en <b style="font-weight:normal;color:#FF00D6">Ingresar</b>      </p>      <p style="text-align: center;">        <img  src="https://www.iorad.com/api/tutorial/stepScreenshot?tutorial_id=1735853&step_number=1&width=800&height=600&mobile_width=450&mobile_height=400&apply_resize=true&min_zoom=0.5" style="max-width: 100%;max-height: 100%;border: none;" alt="Step 1 image" />      </p>          <p style='font-size: 15px; line-height: 136%; margin-top: 59px; margin-bottom: 51px;'>        2. Luego ingrese su <b style="font-weight:normal;color:#FF00D6">Correo electrónico.</b>      </p>      <p style="text-align: center;">        <img  src="https://www.iorad.com/api/tutorial/stepScreenshot?tutorial_id=1735853&step_number=2&width=800&height=600&mobile_width=450&mobile_height=400&apply_resize=true&min_zoom=0.5" style="max-width: 100%;max-height: 100%;border: none;" alt="Step 2 image" />      </p>          <p style='font-size: 15px; line-height: 136%; margin-top: 59px; margin-bottom: 51px;'>        3. Luego ingrese su <b style="font-weight:normal;color:#FF00D6">Contraseña</b>      </p>      <p style="text-align: center;">        <img  src="https://www.iorad.com/api/tutorial/stepScreenshot?tutorial_id=1735853&step_number=3&width=800&height=600&mobile_width=450&mobile_height=400&apply_resize=true&min_zoom=0.5" style="max-width: 100%;max-height: 100%;border: none;" alt="Step 3 image" />      </p>          <p style='font-size: 15px; line-height: 136%; margin-top: 59px; margin-bottom: 51px;'>        4. Y por último, de clic en <b style="font-weight:normal;color:#FF00D6">Ingresar</b>      </p>      <p style="text-align: center;">        <img  src="https://www.iorad.com/api/tutorial/stepScreenshot?tutorial_id=1735853&step_number=4&width=800&height=600&mobile_width=450&mobile_height=400&apply_resize=true&min_zoom=0.5" style="max-width: 100%;max-height: 100%;border: none;" alt="Step 4 image" />      </p>          </div>    </div>        <h3 style="display: none; font-size: 18px; margin-top: 89px; margin-bottom: 43px;">      Here's an interactive tutorial    </h3>    <p style="display: none;">      <a href="https://www.iorad.com/player/1735853/Ingreso-al-sistema-Kreemo">https://www.iorad.com/player/1735853/Ingreso-al-sistema-Kreemo</a>    </p>    <p style="border: 0; min-width: 100%; margin-bottom: 0; height: 501px;">    <iframe src="https://www.iorad.com/player/1735853/Ingreso-al-sistema-Kreemo?src=iframe&oembed=1"            width="100%" height="500px"            style="width: 100%; height: 500px; "            referrerpolicy="strict-origin-when-cross-origin"            frameborder="0" webkitallowfullscreen="webkitallowfullscreen"            mozallowfullscreen="mozallowfullscreen" allowfullscreen="allowfullscreen"></iframe></p>
</div>

</body>
@endsection
