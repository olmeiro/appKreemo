@extends('layouts.app')

@section('body')
<div class="container justify-content-center col-md-8">
    <div class="card" >
            <div class="card-header text-white float-right" style="background-color: #616A6B">
                <strong>Encuestas</strong>
                <!-- <a href="/encuesta/crear" class="btn btn-link">Crear Encuesta</a> -->
                <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModal">Crear encuesta</button>
            </div>
            <div class="card-body">
            @include('flash::message')
                <table id="tbl_encuesta" class="table table-striped table-bordered table-responsive">
                    <thead class="" align="center">
                    <tr>
                        <th>N° Servicio</th>
                        <th>Nombre director</th>
                        <th>Constructora</th>
                        <th>Celular</th>
                        <th>Fecha encuesta</th>
                        <th>Ver encuesta</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
</div>


    <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #616A6B">
                    <h5 class="modal-title" id="exampleModalLabel">Crear encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    @include('flash::message')
                <form class="form-signin col-md-12" action="/encuesta/guardar" method="POST" name="frmEncuesta" id="frmEncuesta">
                @csrf
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Paso 1<br /><small>Buscar Servicio</small></a></li>
                            <li><a href="#step-2">Paso 2<br /><small>Pregunta 1</small></a></li>
                            <li><a href="#step-3">Paso 3<br /><small>Pregunta 2 y 3</small></a></li>
                            <li><a href="#step-4">Paso 4<br /><small>Pregunta 4 y 5</small></a></li>
                            <li><a href="#step-5">Paso 5<br /><small>Pregunta 6 y 7</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">
                                <div class="row mt-3">
                                    <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="">Id del servicio</label>
                                            <label class="validacion" for="idservicio" id="valIdServicio"></label>
                                            <select id="idservicio"  name= "idservicio" class="form-control @error('idservicio') is-invalid @enderror">
                                                <option value="0">Seleccione un servicio</option>
                                                @foreach($servicio as $key =>$value)
                                                    <option value="{{ $value->id }}" {{(('idservicio')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                                @endforeach
                                            </select>
                                            @error('idservicio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="idservicio" id="valIdServicio2"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nombre del director de la obra</label>
                                            <label class="validacion" for="directorobra" id="valDirectorObra"></label>
                                            <input type="text" class="form-control @error('directorobra') is-invalid @enderror" id="directorobra" name="directorobra">
                                            @error('directorobra')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="directorobra" id="valDirectorObra2"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Constructora</label>
                                            <label class="validacion" for="constructora" id="valConstructora"></label>
                                            <input type="text" class="form-control @error('constructora') is-invalid @enderror" id="constructora" name="constructora">
                                            @error('constructora')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="constructora" id="valConstructora2"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Correo</label>
                                            <label class="validacion" for="correo" id="valCorreo"></label>
                                            <input type="text" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" >
                                            @error('correo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="correo" id="valCorreo2"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Celular</label>
                                            <label class="validacion" for="celular" id="valCelular"></label>
                                            <input type="tel" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Ejm: 3212345678" >
                                            @error('celular')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="celular" id="valCelular2"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Fecha</label>
                                            <label class="validacion" for="mes" id="valMes"></label>
                                            <input type="date" class="form-control @error('mes') is-invalid @enderror" id="mes" name="mes" >
                                            @error('mes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="mes" id="valMes2"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <p><b>1.</b>Califique de 1 a 5 los siguientes aspectos prestados por Vinicol Bombeos</p>
                                    <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="">Puntualidad</label>
                                            <label class="validacion" for="respuesta1_1" id="valRespuesta1_1"></label>
                                            <select id="respuesta1_1"  name= "respuesta1_1" class="form-control @error('respuesta1_1') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            @error('respuesta1_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_1" id="valRespuesta1_12"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Solución de problemas</label>
                                            <label class="validacion" for="respuesta1_2" id="valRespuesta1_2"></label>
                                            <select id="respuesta1_2"  name= "respuesta1_2" class="form-control @error('respuesta1_2') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            @error('respuesta1_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_2" id="valRespuesta1_22"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Orden y aseo</label>
                                            <label class="validacion" for="respuesta1_3" id="valRespuesta1_3"></label>
                                            <select id="respuesta1_3"  name= "respuesta1_3" class="form-control @error('respuesta1_3') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            @error('respuesta1_3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_3" id="valRespuesta1_32"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Cumplimiento en requisitos</label>
                                            <label class="validacion" for="respuesta1_4" id="valRespuesta1_4"></label>
                                            <select id="respuesta1_4"  name= "respuesta1_4" class="form-control @error('respuesta1_4') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            @error('respuesta1_4')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_4" id="valRespuesta1_42"></label>
                                        </div>
                                    </div>
                                </div>
                            <div id="step-3">
                                <p><b>2.</b>¿tuvo algún inconveniente durante la prestación del servicio?</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <label class="validacion" for="respuesta2" id="valRespuesta2"></label>
                                        <select id="respuesta2"  name= "respuesta2" class="form-control @error('respuesta2') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @error('respuesta2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta2" id="valRespuesta22"></label>
                                        </div>
                                        </div>
                                            <p><b>3.</b> Si la <u>respuesta 2</u> fué SI, describa la situación:</p>
                                            <label class="validacion" for="respuesta3" id="valRespuesta3"></label>
                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control @error('respuesta3') is-invalid @enderror" id="respuesta3" name="respuesta3" placeholder="Ingresa las observaciones"></textarea>
                                            @error('respuesta3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta3" id="valRespuesta32"></label>
                                        </div>
                                    </div>
                            </div>
                            <div id="step-4">
                                <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <label class="validacion" for="respuesta4" id="valRespuesta4"></label>
                                        <select id="respuesta4"  name= "respuesta4" class="form-control @error('respuesta4') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                        </select>
                                        @error('respuesta4')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta4" id="valRespuesta42"></label>
                                    </div>
                                    </div>
                                <p><b>5.</b> ¿Qué aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado? </p>
                                <label class="validacion" for="respuesta5" id="valRespuesta5"></label>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <textarea class="form-control @error('respuesta5') is-invalid @enderror " id="respuesta5" name="respuesta5" placeholder="Ingresa las observaciones"></textarea>
                                        @error('respuesta5')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta5" id="valRespuesta52"></label>
                                    </div>
                                    </div>
                            </div>
                            <div id="step-5">
                                <p><b>6.</b> ¿Volvería usted a utilizar los servicios de VINICOL BOMBEOS?</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <label class="validacion" for="respuesta6" id="valRespuesta6"></label>
                                        <select id="respuesta6"  name= "respuesta6" class="form-control @error('respuesta6') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        @error('respuesta6')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta6" id="valRespuesta62"></label>
                                    </div>
                                    </div>
                                <p><b>7.</b> ¿Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <label class="validacion" for="respuesta7" id="valRespuesta7"></label>
                                        <select id="respuesta7"  name= "respuesta7" class="form-control @error('respuesta7') is-invalid @enderror">
                                            <option value="0" selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        @error('respuesta7')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta7" id="valRespuesta72"></label>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection
@section("scripts")
    <script>
        $('#tbl_encuesta').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/encuesta/listar',
                columns: [
                    {
                    data: 'idservicio',
                    name: 'idservicio'
                    },
                    {
                    data: 'directorobra',
                    name: 'directorobra'
                    },
                    {
                    data: 'constructora',
                    name: 'constructora'
                    },
                    {
                    data: 'celular',
                    name: 'celular'
                    },
                    {
                    data: 'mes',
                    name: 'mes'
                    },
                    {
                        data: 'eliminar',
                        name: 'eliminar',
                        orderable: false,
                        searchable: false
                    }
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                            }
            });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionEncuesta.js') }}"></script>
@endsection
