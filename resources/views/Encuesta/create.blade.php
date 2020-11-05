@extends('layouts.app')

@section('body')
<div class="card">
    <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Crear encuesta</strong>
    </div>
    <div class="card-body">
        @include('flash::message')
        <form action="/encuesta/guardar" method="POST" enctype="multipart/form-data" name="frmEncuesta" id="frmEncuesta">
            @csrf
            <input type="hidden" id="id">
            <div class="card">
                <div class="card-header">
                    <h2>Información del cliente</h2>
                </div>
                <div class="card-body">
                    <div class="form-row" >
                        <div class="form-group col-md-4">
                            <label for="">N° servicio</label>
                            <label class="validacion" for="idservicio" id="valIdServicio"></label>
                            <input type="text" value="{{ $id ?? '' }}" id="idservicio" name="idservicio" class="form-control">
                            @error('idservicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="idservicio" id="valIdServicio2"></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Nombre (Quien responde la encuesta)</label>
                            <label class="validacion" for="directorobra" id="valDirectorObra"></label>
                            <input type="text" class="form-control @error('directorobra') is-invalid @enderror" id="directorobra" name="directorobra" value="{{old('directorobra')}}">
                            @error('directorobra')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="directorobra" id="valDirectorObra2"></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Empresa</label>
                            <label class="validacion" for="constructora" id="valConstructora"></label>
                            <input type="text" class="form-control @error('constructora') is-invalid @enderror" id="constructora" name="constructora" value="{{$empresa[0]->nombre}}">
                            @error('constructora')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="constructora" id="valConstructora2"></label>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="form-group col-md-4">
                            <label for="">Correo</label>
                            <label class="validacion" for="correo" id="valCorreo"></label>
                            <input type="text" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{$empresa[0]->correo1}}">
                            @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="correo" id="valCorreo2"></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Celular</label>
                            <label class="validacion" for="celular" id="valCelular"></label>
                            <input type="tel" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{$empresa[0]->telefono1}}">
                            @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="celular" id="valCelular2"></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha</label>
                            <label class="validacion" for="mes" id="valMes"></label>
                            <input type="date" class="form-control @error('mes') is-invalid @enderror" id="mes" name="mes" value="{{old('mes')}}" >
                            @error('mes')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="validacion" for="mes" id="valMes2"></label>
                        </div>
                    </div>
                </div>
            </div>
                    <hr style="border-color:red;">

            <div class="card">
                <div class="card-header">
                    <h2>Preguntas</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>1.</b> Califique de 1 a 5 los siguientes aspectos prestados por Vinicol Bombeos, siendo 1 en menor puntaje y 5 el mayor puntaje</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-2">
                                            <label for="">Puntualidad</label>
                                            <label class="validacion" for="respuesta1_1" id="valRespuesta1_1"></label>
                                            <select  id="respuesta1_1"  name= "respuesta1_1" class="form-control @error('respuesta1_1') is-invalid @enderror">
                                                <option value="0" selected>Califique</option>
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
                                        <div class="form-group col-md-4">
                                            <label for="">Solución de problemas</label>
                                            <label class="validacion" for="respuesta1_2" id="valRespuesta1_2"></label>
                                            <select  id="respuesta1_2"  name= "respuesta1_2" class="form-control @error('respuesta1_2') is-invalid @enderror">
                                                <option value="0" selected>Califique</option>
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
                                        <div class="form-group col-md-2">
                                            <label for="">Orden y aseo</label>
                                            <label class="validacion" for="respuesta1_3" id="valRespuesta1_3"></label>
                                            <select  id="respuesta1_3"  name= "respuesta1_3" class="form-control @error('respuesta1_3') is-invalid @enderror">
                                                <option value="0" selected>Califique</option>
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
                                        <div class="form-group col-md-4">
                                            <label for="">Cumplimiento en requisitos</label>
                                            <label class="validacion" for="respuesta1_4" id="valRespuesta1_4"></label>
                                            <select value="0" id="respuesta1_4"  name= "respuesta1_4" class="form-control @error('respuesta1_4') is-invalid @enderror">
                                                <option value="0" selected>Califique</option>
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
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>2.</b> tuvo algún inconveniente durante la prestación del servicio</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <label for="">SI - NO</label>
                                            <label class="validacion" for="respuesta2" id="valRespuesta2"></label>
                                            <select  id="respuesta2"  name= "respuesta2" class="form-control @error('respuesta2') is-invalid @enderror">
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
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>3.</b> Si la <u>respuesta 2</u> fué SI, describa la situación:</p>
                                    <label class="validacion" for="respuesta3" id="valRespuesta3"></label>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control @error('respuesta3') is-invalid @enderror" id="respuesta3" name="respuesta3" placeholder="Ingresa las observaciones" value="{{old('respuesta3')}}"></textarea>
                                            @error('respuesta3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta3" id="valRespuesta32"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <label for="">SI - NO</label>
                                            <label class="validacion" for="respuesta4" id="valRespuesta4"></label>
                                            <select  id="respuesta4"  name= "respuesta4" class="form-control @error('respuesta4') is-invalid @enderror">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>5.</b> Que aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado. </p>
                                    <label class="validacion" for="respuesta5" id="valRespuesta5"></label>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control @error('respuesta5') is-invalid @enderror " id="respuesta5" name="respuesta5" placeholder="Ingresa las observaciones" value="{{old('respuesta5')}}"></textarea>
                                            @error('respuesta5')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta5" id="valRespuesta52"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>6.</b> Volvería Usted a Utilizar los servicios de VINICOL BOMBEOS</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <label for="">SI - NO</label>
                                            <label class="validacion" for="respuesta6" id="valRespuesta6"></label>
                                            <select  id="respuesta6"  name= "respuesta6" class="form-control @error('respuesta6') is-invalid @enderror">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card">
                                <div class="card-header">
                                    <p><b>7.</b> Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row" >
                                        <div class="form-group col-md-12">
                                            <label for="">SI - NO</label>
                                            <label class="validacion" for="respuesta7" id="valRespuesta7"></label>
                                            <select  id="respuesta7"  name= "respuesta7" class="form-control @error('respuesta7') is-invalid @enderror">
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
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-success">Guardar Encuesta</button>
                <a href="/encuesta" class="btn btn-outline-primary" >Volver</a>
        </form>
    </div>
</div>
@endsection

@section('style')
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/validacionEncuesta.js') }}"></script>
    <script src='{{ asset("assets/dashboard/assets/fullcalendar/moment.min.js")}}'></script>
@endsection
