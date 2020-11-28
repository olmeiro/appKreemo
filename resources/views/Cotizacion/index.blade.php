@extends('layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white float-right" style="background-color: #616A6B">
            <strong>Cotizaciones</strong>

            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalE" data-toggle="tooltip" data-placement="top" title="Ver las etapas">Etapas</button>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalJ">Jornadas</button>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalM">Modalidad</button>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalC">Tipos de concreto</button>

            <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModal">Crear cotización</button>
            <a class="btn btn-outline-light float-right"  href="/cotizacion/informe"><i class="fas fa-file-pdf"> </i> Descargar cotización</a>




        </div>
        <div class="card-body table-responsive">
            @include('flash::message')
            <table id="tbl_cotizacion" class="table table-bordered table-striped " style="width: 100%;">
                <thead class="" align="center">
                <tr>
                    <th>Cot. N°</th>
                    <th>Empresa</th>
                    <th data-valor="En la columna ESTADO podras ver el estado de las cotizaciones" class="click">Estado</th>
                    <th>Obra</th>
                    <th>Fecha cotización</th>
                    <th>Fecha inicio bombeo</th>
                    <th>Valor total</th>
                    <th>Editar</th>
                    <th>Cambiar estado</th>
                </tr>
                </thead>
                <tbody>
  {{--  --}}
                </tbody>
            </table>
        </div>
        <div class="card-footer text-white" style="background-color: #616A6B">

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">Crear cotización</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button> --}}
                <a href="" class="btn btn-secondary" data-dismiss="modal">X</a>
            </div>
            <div class="modal-body">
                @include('flash::message')
                <form class="form-signin col-md-12" action="/cotizacion/guardar" method="POST" name="FrmCrearCotizacion" id="FrmCrearCotizacion">
                    @csrf
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Paso 1<br /><small>Información</small></a></li>
                            <li><a href="#step-2">Paso 2<br /><small>Información</small></a></li>
                            <li><a href="#step-3">Paso 3<br /><small>Información</small></a></li>
                            <li><a href="#step-4">Paso 4<br /><small>Cálculos</small></a></li>
                            <li><a href="#step-5">Paso 5<br /><small>Transporte</small></a></li>
                            <li><a href="#step-6">Paso 6<br /><small>Observaciones</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Selecciona la empresa">Empresa</label>
                                        <label class="validacion" id="val_empresa"></label>
                                        <select id="IdEmpresa"  name= "IdEmpresa"  class="form-control @error('IdEmpresa') is-invalid @enderror" onchange="traerObra()">
                                            <option value="0">Seleccione una Empresa</option>
                                            @foreach($empresa as $key =>$value)
                                            <option value="{{ $value->id }}" {{(old('IdEmpresa')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('IdEmpresa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_empresa2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Selecciona la obra">Obra</label>
                                        <label class="validacion" id="val_Obra"></label>
                                        <select id="IdObra" name="IdObra" class="form-control">
                                        <option selected="selected">Seleccione una Obra</option>
                                        </select>
                                        <label class="validacion" id="val_Obra2"></label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Estado inicial En proceso">Estado</label>
                                        <label class="validacion" id="val_Estado"></label>
                                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                                            <option value="1">En Proceso</option>

                                        </select>
                                        @error('IdEstado')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Estado2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Selecciona la modalidad">Modalidad</label>
                                        <label class="validacion" id="val_Modalidad"></label>
                                        <select id="IdModalidad"  name= "IdModalidad" class="form-control @error('IdModalidad') is-invalid @enderror">
                                            <option value="0">Seleccione una Modalidad</option>
                                            @foreach($modalidad as $key =>$value)
                                            <option value="{{ $value->id }}" {{(old('IdModalidad')==$value->id)? 'selected':''}}>{{ $value->modalidad}}</option>
                                            @endforeach
                                        </select>
                                        @error('IdModalidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Modalidad2"></label>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Selecciona la jornada">Jornada</label>
                                        <label class="validacion" id="val_Jornada"></label>
                                        <select id="IdJornada"  name= "IdJornada" class="form-control @error('IdJornada') is-invalid @enderror">
                                            <option value="0">Seleccione una Jornada</option>
                                            @foreach($jornada as $key =>$value)
                                            <option value="{{ $value->id }}" {{(old('IdJornada')==$value->id)? 'selected':''}}>{{ $value->jornada_nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('IdJornada')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Jornada2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Selecciona la etapa">Etapa</label>
                                        <label class="validacion" id="val_Etapa"></label>
                                        <select id="IdEtapa"  name= "IdEtapa" class="form-control @error('IdEtapa') is-invalid @enderror">
                                            <option value="0">Seleccione una Etapa</option>
                                            @foreach($etapa as $key =>$value)
                                            <option value="{{ $value->id }}" {{(old('IdEtapa')==$value->id)? 'selected':''}}>{{ $value->etapa}}</option>
                                            @endforeach
                                        </select>
                                        @error('IdEtapa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Etapa2"></label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Selecciona el tipo de concreto">Tipo de concreto</label>
                                        <label class="validacion" id="val_TipoConcreto"></label>
                                            <select id="IdTipo_Concreto"  name= "IdTipo_Concreto" class="form-control @error('IdTipo_Concreto') is-invalid @enderror">
                                                <option value="0">Seleccione un Tipo de Concreto</option>
                                                @foreach($tipoconcreto as $key =>$value)
                                                <option value="{{ $value->id }}" {{(old('IdTipo_Concreto')==$value->id)? 'selected':''}}>{{ $value->tipo_concreto}}</option>
                                                @endforeach
                                            </select>
                                            @error('IdTipo_Concreto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" id="val_TipoConcreto2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""data-toggle="tooltip" data-placement="top" title="Digita el nombre de la ciudad">Ciudad</label>
                                        <label class="validacion" id="val_ciudad"></label>
                                        <input type="text" class="form-control @error('Ciudad') is-invalid @enderror" onkeypress="return soloLetras(event)" id="Ciudad" name="Ciudad" value="{{old('Ciudad')}}">
                                        @error('Ciudad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_ciudad2"></label>
                                    </div>
                                </div>

                            </div>
                            <div id="step-3" class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="FechaCotizacion" data-toggle="tooltip" data-placement="top" title="Fecha de la cotización">Fecha de cotización</label>
                                        <label class="validacion" id="val_FechaCotizacion"></label>
                                        <input type="data" data-date-format="yy-m-d" class="form-control calendarioI @error('FechaCotizacion') is-invalid @enderror " id="FechaCotizacion" name="FechaCotizacion" value="{{old('FechaCotizacion')}}">
                                        @error('FechaCotizacion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_FechaCotizacion2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="InicioBombeo" data-toggle="tooltip" data-placement="top" title="Fecha de inicio del servicio">Fecha de inicio bombeo</label>
                                        <label class="validacion" id="val_FechaInicio"></label>
                                        <input type="date" data-date-format="yy-m-d" class="form-control @error('InicioBombeo') is-invalid @enderror" id="InicioBombeo" name="InicioBombeo" value="{{old('InicioBombeo')}}">
                                        @error('InicioBombeo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_FechaInicio2"></label>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Campo numerico NO obligatorio">Cantidad de losas <i class="fas fa-info-circle"></i></label>
                                        <label class="validacion" id="val_Losas"></label>
                                        <input type="text" class="form-control @error('Losas') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Losas" name="Losas" value="{{old('Losas')}}">
                                        @error('Losas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Losas2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Campo numerico NO obligatorio">Cantidad de tubería <i class="fas fa-info-circle"></i></label>
                                        <label class="validacion" id="val_Tuberia"></label>
                                        <input type="text" class="form-control @error('Tuberia') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Tuberia" name="Tuberia" value="{{old('Tuberia')}}">
                                        @error('Tuberia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Tuberia2"></label>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Campo numerico OBLIGATORIO">Cantidad de metros<sup>3</sup> <i class="fas fa-info-circle"></i></label>
                                        <label class="validacion" id="val_Metros"></label>
                                        <input type="text" class="form-control @error('MetrosCubicos') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="MetrosCubicos" name="MetrosCubicos" >
                                        @error('MetrosCubicos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Metros2"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Campo numerico OBLIGATORIO">Valor metro<sup>3</sup> <i class="fas fa-info-circle"></i></label>
                                        <label class="validacion" id="val_ValorMetro"></label>
                                        <input type="text" class="form-control @error('ValorMetro') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="ValorMetro" name="ValorMetro"  onchange="valor_total()">
                                        @error('ValorMetro')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_ValorMetro2"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">AIU</label>
                                        <label class="validacion" id="val_AIU"></label>
                                        <input type="text" class="form-control @error('AIU') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="AIU" name="AIU" readonly data-toggle="tooltip" data-placement="top" title="Valor del AIU 5% del subtotal">
                                        @error('AIU')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_AIU2"></label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="">Subtotal</label>
                                        <label class="validacion" id="val_SubTotal"></label>
                                        <input type="text" class="form-control @error('Subtotal') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Subtotal" name="Subtotal" readonly data-toggle="tooltip" data-placement="top" title="Cantidad de metros X valor metro">
                                        @error('Subtotal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_SubTotal2"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">IVA al AIU</label>
                                        <label class="validacion" id="val_IvaAIU"></label>
                                        <input type="text" class="form-control @error('IvaAIU') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="IvaAIU" name="IvaAIU" readonly data-toggle="tooltip" data-placement="top" title="Valor del 19% del AIU">
                                        @error('IvaAIU')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_IvaAIU2"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Valor total</label>
                                        <label class="validacion" id="val_ValorTotal"></label>
                                        <input type="text" class="form-control @error('ValorTotal') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="ValorTotal" name="ValorTotal" readonly data-toggle="tooltip" data-placement="top" title="Subtotal + iva al AIU">
                                        @error('ValorTotal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_ValorTotal2"></label>
                                    </div>
                                </div>
                            </div>
                            <div id="step-5" class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" data-toggle="tooltip" data-placement="top" title="Valor del transporte de ida a la obra">Valor transporte</label>
                                        <label class="validacion" id="val_Valtrans"></label>
                                        <input type="text" class="form-control @error('ValorTransporte') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="ValorTransporte" name="ValorTransporte"  onchange="valor_totaltransporte()">
                                        @error('ValorTransporte')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_Valtrans2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">AIU transporte</label>
                                        <label class="validacion" id="val_AIUtrans"></label>
                                        <input type="text" class="form-control @error('AIUtrans') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="AIUtrans" name="AIUtrans" readonly data-toggle="tooltip" data-placement="top" title="Valor del AIU: 5% del transporte">
                                        @error('AIUtrans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_AIUtrans2"></label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">IVA al AIU transporte</label>
                                        <label class="validacion" id="val_IvaAIUtrans"></label>
                                        <input type="text" class="form-control @error('IvaAIUtrans') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="IvaAIUtrans" name="IvaAIUtrans" readonly data-toggle="tooltip" data-placement="top" title="Valor del 19%  al AIU del transporte">
                                        @error('IvaAIUtrans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_IvaAIUtrans2"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Valor total transporte</label>
                                        <label class="validacion" id="val_ValorTotaltrans"></label>
                                        <input type="text" class="form-control @error('ValorTotaltrans') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="ValorTotaltrans" name="ValorTotaltrans" readonly data-toggle="tooltip" data-placement="top" title="Valor transporte + valor iva al AIU">
                                        @error('ValorTotaltrans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" id="val_ValorTotaltrans2"></label>
                                    </div>
                                </div>
                            </div>
                            <div id="step-6" class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="validationTextarea" data-toggle="tooltip" data-placement="top" title="Notas generadas para adjuntar a la propuesta comercial">Notas propuesta <i class="fas fa-info-circle"></i></label>
                                        <textarea class="form-control @error('Observaciones') is-invalid @enderror " id="Observaciones" name="Observaciones" placeholder="Ingresa notas de la propuesta economica" ></textarea>
                                        @error('Observaciones')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="validationTextarea" data-toggle="tooltip" data-placement="top" title="Notas generadas para adjuntar a la letra chica">Notas letra chica <i class="fas fa-info-circle"></i></label>
                                        <textarea class="form-control @error('Observaciones2') is-invalid @enderror " id="Observaciones2" name="Observaciones2" placeholder="Ingresa las notas de la letra chica" ></textarea>
                                        @error('Observaciones2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-success float-left">Crear cotización</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">Etapas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @include('flash::message')
                    <table id="tbl_etapa" class="table table-bordered table-striped " style="width: 100%;">
                        <thead class="" align="center">
                        <tr >
                            <th align="center">Id N°</th>
                            <th align="center">Etapa</th>
                        </tr>
                        </thead>
                    </table>
            </div>
            <div class="modal-footer">
                <a href="/etapa" class="btn btn-outline-light float-left" style="background-color: #616A6B" >Ir a etapas</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalJ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">Jornadas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('flash::message')
                <table id="tbl_jornada" class="table table-bordered" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Id N°</th>
                        <th>Jornada</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <a href="/jornada" class="btn btn-outline-light float-left" style="background-color: #616A6B" >Ir a jornadas</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">Modalidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('flash::message')
                <table id="tbl_modalidad" class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Id N°</th>
                        <th>Modalidad</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <a href="/modalidad" class="btn btn-outline-light float-left" style="background-color: #616A6B" >Ir a modalidad</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-header text-white" style="background-color: #616A6B">
                <strong>Tipos de concreto</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="card-body">
                @include('flash::message')
                <table id="tbl_tipoconcreto" class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>N° Tipo concreto</th>
                        <th>Tipo concreto</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <a href="/tipoConcreto" class="btn btn-outline-light float-left" style="background-color: #616A6B" >Ir a tipo concreto</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="exampleModalR" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="card-header text-white" style="background-color: #616A6B"">
                <strong>Generar reporte contización</strong>
            </div>
            <div class="card-body">
                @include('flash::message')
                <form action="/cotizacion/generar/pdf" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Número de cotización</label>
                            <input type="text" class="form-control" name="id">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-left">Generar informe</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection
@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#FechaCotizacion", {
            minDate: "today",
            maxDate: "",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
        });

        flatpickr("#InicioBombeo", {
            minDate: "today",
            maxDate: "",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                },
            },
        });
    </script>
    <script>
        $('#tbl_cotizacion').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/cotizacion/listar',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'nombre_empresa',
                        name: 'nombre_empresa',
                    },
                    {
                        data: 'estado_cotizacion',
                        name: 'estado_cotizacion',
                    },
                    {
                        data: 'nombre_obra',
                        name: 'nombre_obra',
                    },
                    {
                        data: 'fechaCotizacion',
                        name: 'fechaCotizacion',
                    },
                    {
                        data: 'inicioBombeo',
                        name: 'inicioBombeo',
                    },
                    {
                        data: 'valorTotal',
                        name: 'valorTotal',
                        render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'editarEstado',
                        name: 'editarEstado',
                        orderable: false,
                        searchable: false,
                    },

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
                            },
                "columnDefs":   [
                                {
                                "targets": [2],
                                "createdCell": function(td, cellData, rowData, row, col) {
                                    var color;
                                    switch(cellData) {
                                    case "Perdida":
                                        color = '#FF3229';

                                        //Swal.fire('Se encuentran cotizaciones perdidas');
                                        $(td).html('Perdida.... Revisar negociación');
                                        $(td).addClass('perdida');
                                        break;
                                    case "En Proceso":
                                        color = '#FFDE00';
                                        $(td).html('En Proceso .... A la espera de respuesta del cliente');
                                        $(td).addClass('proceso');
                                        break;
                                    case "Aceptada":
                                        color = '#06B33A';
                                        $(td).html('Aceptada.... Lista para iniciar servicio');
                                        $(td).addClass('aceptada');
                                        break;
                                    case "Agendada":
                                        color = '#06A';
                                        $(td).html('Agendada.... Servicio en ejecución');
                                        $(td).addClass('agendada');
                                        //Swal.fire('Se encuentran cotizaciones Aegndadas');
                                        break;
                                    default:
                                        color = '#FFDE00';
                                        break;
                                    }
                                        $(td).css('background',color);
                                    }
                                }
                                ],

            });

            function limpiar()
            {
                $("input").val("");
                $("select").val("");
                $("label").val("");
                $("#val_empresa2").text("");
                $("#val_Estado2").text("");
                $("#val_Modalidad2").text("");
                $("#val_Etapa2").text("");
                $("#val_Jornada2").text("");
                $("#val_TipoConcreto2").text("");
                $("#val_Obra2").text("");
                $("#val_ciudad2").text("");
                $("#val_FechaCotizacion2").text("");
                $("#val_FechaInicio2").text("");
                $("#val_Losas2").text("");
                $("#val_Tuberia2").text("");
                $("#val_Metros2").text("");
                $("#val_ValorMetro2").text("");
                $("#val_AIU2").text("");
                $("#val_SubTotal2").text("");
                $("#val_IvaAIU2").text("");
                $("#val_ValorTotal2").text("");
                $("#val_AIU2").text("");
            }

            $(function(){
                $(".click").click(function(e) {
                    e.preventDefault();
                    var data = $(this).attr("data-valor");
                    Swal.fire(data);
                });
            });
            $(function(){
                $(".aceptada").click(function(e) {
                    e.preventDefault();

                    Swal.fire('Cotizacion Agendada y en ejecucion en el momento');
                });
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
    <script src="{{ asset('assets/modal/js/cotizacion.js') }}"></script>
    <script src="{{ asset('js/validacionCotizacion.js') }}"></script>
    <script src="{{ asset('js/modalesCotizacion.js') }}"></script>
@endsection



