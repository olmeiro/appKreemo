@extends('layouts.app')


@section('body')

<body>
    <div class="container">

        <h4 align="center" class="titulo" data-toggle="popover" title="Manual de usuarios" data-placement="top" data-content="">Manual de usuario</h4>
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            </nav> -->
        <div class="card-deck">
                <div class="card text-center">
                            <div class="card-header text-white" style="background-color: #616A6B">
                                    {{-- Módulo usuarios --}}
                                    <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo usuarios" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo usuarios</button>
                            </div>
                            <div class="card-body">
                                <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/community/#!flows/cmo-crear-editar-inactivar-o-activar-a-un-usuario/1ebbfbe0-1ea7-11eb-a268-3e2a4292da47/">¿Cómo crear, editar,  inactivar o activar a un usuario?</a>
                                </div>
                            </div>
                </div>

                <div class="card text-center">
                            <div class="card-header text-white" style="background-color: #616A6B">
                                    {{-- Módulo clientes --}}
                                    <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo clientes" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo clientes</button>
                            </div>
                            <div class="card-body">
                                <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                    <a target="_blanck" href="https://whatfix.com/community/#!flows/cmo-crear-editar-una-empresa/447ef030-1eac-11eb-a268-3e2a4292da47/">¿Cómo crear, asociar obra, editar, inactivar o activar una empresa?</a>
                                </div>
                                <br>
                                <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/community/#!flows/cmo-crear-asociar-contactos-editar-y-eliminar-una-obra/b029dbb0-1eb1-11eb-a268-3e2a4292da47/">¿Cómo crear, asociar contactos, eliminar y editar una obra?</a>
                                </div>
                                <br>
                                <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/community/#!flows/cmo-crear-editar-y-eliminar-un-contacto-o-un-tipo-de-contacto/bd1c4d60-1eb3-11eb-a268-3e2a4292da47/">¿Cómo crear, editar y eliminar un contacto o un tipo de contacto?</a>
                                </div>
                            </div>
                </div>

                <div class="card text-center">
                    <div class="card-header text-white" style="background-color: #616A6B"">
                            {{-- Módulo estadisticas --}}
                            <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo estadisticas" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo estadisticas</button>
                    </div>
                    <div class="card-body">
                    <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                        <a  target="_blanck" href="https://whatfix.com/#!flows/cmo-ingresar-al-mdulo-estadsticas-y-ver-su-contenido/eb7a6960-1ec9-11eb-a268-3e2a4292da47/">¿Cómo ingresar al módulo estadísticas y ver su contenido?</a>
                    </div>

                    </div>
                </div>
        </div>
        <br>
        <div class="card-deck">
                <div class="card text-center">
                            <div class="card-header text-white" style="background-color: #616A6B">
                                    {{-- Módulo maquinaria --}}
                                <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo maquinaria" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo maquinaria</button>
                            </div>
                            <div class="card-body">
                            <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-eliminar-y-cambiar-de-estado-una-mquina/6427ad70-1ec3-11eb-a268-3e2a4292da47/">¿Cómo crear, editar, eliminar y cambiar de estado una máquina?</a>
                            </div>
                            <br>
                            <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-y-eliminar-un-operario/2f7c9850-1ec4-11eb-a268-3e2a4292da47/">¿Cómo crear, editar y eliminar un operario?</a>
                            </div>
                            </div>
                </div>

                <div class="card text-center">
                            <div class="card-header text-white" style="background-color: #616A6B">
                                    {{-- Módulo servicio --}}
                                <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo servicio" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo servicio</button>
                            </div>
                            <div class="card-body">
                            <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/#!flows/cmo-agendar-editar-o-eliminar-un-servicio-en-el-calendario/d904e7a0-1ec5-11eb-a268-3e2a4292da47/">¿Cómo agendar, editar o eliminar un servicio en el calendario?</a>
                            </div>
                        <br>
                            <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                                <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-un-servicio-ver-y-crearle-una-encuesta/4fb02b10-1ec8-11eb-a268-3e2a4292da47/">¿Cómo crear un servicio, ver y crearle una encuesta?</a>
                            </div>
                            </div>
                </div>

                <div class="card text-center">
                    <div class="card-header text-white" style="background-color: #616A6B">
                            {{-- Módulo visitas --}}
                            <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo visitas" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo visitas</button>
                    </div>
                    <div class="card-body">
                    <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                        <a target="_blanck" href="https://whatfix.com/community/#!flows/cmo-agendar-editar-o-eliminar-una-cita-de-visita-en-el-calendario/423da730-1eb6-11eb-a268-3e2a4292da47/">¿Cómo agendar, editar o eliminar una cita de visita en el calendario?</a>
                    </div>
                    <br>
                    <div data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                        <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-o-editar-una-lista-de-chequeo/d39623e0-1eb8-11eb-a268-3e2a4292da47/">¿Cómo crear o editar una lista de chequeo?</a>
                    </div>
                    </div>
                </div>
        </div>
        <br>
        <div class="card-deck">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #616A6B">
                        {{-- Módulo cotización --}}
                        <button type="button" class="btn btn-outline-light float-center" data-toggle="popover" title="Módulo cotización" data-content="Aqui puedes ver el funcionamiento de este módulo">Módulo cotización</button>
                </div>
                <div class="card-body card-deck">
                        <div class="manual" data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                            <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-cambiar-de-estado-y-descargar-una-cotizacin/98c0a8e0-1ebc-11eb-a268-3e2a4292da47/">¿Cómo crear, editar, cambiar de estado y descargar una cotización?</a>
                        </div>
                    <br>
                        <div class="manual" data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                            <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-o-eliminar-un-estado-de-cotizacin/d3f875e0-1ebd-11eb-a268-3e2a4292da47/">¿Cómo crear, editar o eliminar un estado de cotización?</a>
                        </div>
                    <br>
                        <div class="manual" data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                            <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-y-eliminar-una-etapa/c77d9dd0-1ebe-11eb-a268-3e2a4292da47/">¿Cómo crear, editar y eliminar una etapa?</a>
                        </div>
                    <br>
                        <div class="manual" data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                            <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-y-eliminar-una-jornada/80c19850-1ebf-11eb-a268-3e2a4292da47/">¿Cómo crear, editar y eliminar una jornada?</a>
                        </div>
                    <br>
                        <div class="manual" data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                            <a target="_blanck" href="https://whatfix.com/#!flows/  cmo-crear-editar-y-eliminar-una-modalidad/4c8809b0-1ec0-11eb-a268-3e2a4292da47/">¿Cómo crear, editar y eliminar una modalidad?</a>
                        </div>
                    <br>
                        <div class="manual" data-widget-type=deck data-flow="793195f0-1e28-11eb-8b0a-3e2a4292da47">
                            <a target="_blanck" href="https://whatfix.com/#!flows/cmo-crear-editar-y-eliminar-un-tipo-de-concreto/ab954520-1ec1-11eb-a268-3e2a4292da47/">¿Cómo crear, editar y eliminar un tipo de concreto?</a>
                        </div>
                </div>
            </div>


        </div>



    @yield("body2")


    </div>


</body>
@endsection
@section('style')
    <link href="{{ asset('css/styleManual.css') }}" rel="stylesheet">
@endsection
@section("scripts")
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="{{ asset('js/manuales.js') }}"></script>
@endsection
