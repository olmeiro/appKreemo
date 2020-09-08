@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>COTIZACIONES</strong>
                <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalE">VER ETAPAS</button>
                <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalJ">VER JORNADAS</button>
                <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalM">VER MODALIDAD</button>

                {{-- <a class="btn btn-outline-light" href="/cotizacion/crear">CREAR COTIZACIÓN</a> --}}
                {{-- <a class="btn btn-link" href=""><i class="fas fa-file-pdf"> </i> GENERAR REPORTE</a>
                <a class="btn btn-link" href="/cotizacion/wizardModal">WIZAR</a> --}}
                <button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#exampleModal">CREAR COTIZACIÓN</button>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_cotizacion" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead class="" align="center">
                <tr>
                    <th>Cotizacion N°</th>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Modalidad</th>
                    <th>Etapa</th>
                    <th>Jornada</th>
                    <th>Tipo Concreto</th>
                    <th>Obra</th>
                    <th>maquinaria</th>
                    <th>Operario</th>
                    <th>Fecha Cotización</th>
                    <th>Fecha Inicio Bombeo</th>
                    <th>Ciudad</th>
                    <th>Cantidad de losas</th>
                    <th>Cantidad de tuberia</th>
                    <th>Cantidad de Metros </th>
                    <th>Valor del Metro </th>
                    <th>AIU</th>
                    <th>Subtotal</th>
                    <th>IVA al AIU</th>
                    <th>Valor Total</th>
                    <th>Observaciones</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="card-footer text-white" style="background-color: #616A6B">

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">Crear Cotización</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                @include('flash::message')
            <form class="form-signin col-md-12" action="/cotizacion/guardar" method="POST" name="FrmCrearCotizacion" id="FrmCrearCotizacion">
            @csrf
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">Paso 1<br /><small>Account Info</small></a></li>
                        <li><a href="#step-2">Paso 2<br /><small>Personal Info</small></a></li>
                        <li><a href="#step-3">Paso 3<br /><small>Payment Info</small></a></li>
                        <li><a href="#step-4">Paso 4<br /><small>Calculos</small></a></li>
                        <li><a href="#step-5">Paso 5<br /><small>Observaciones</small></a></li>

                    </ul>
                    <div>
                        <div id="step-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Empresa</label>
                                    <label class="validacion" id="val_empresa"></label>
                                    <select id="IdEmpresa"  name= "IdEmpresa"  class="form-control @error('IdEmpresa') is-invalid @enderror">
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
                                    <label for="">Estado</label>
                                    <label class="validacion" id="val_Estado"></label>
                                    <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                                        <option value="0">Seleccione un Estado</option>
                                        @foreach($estadocotizacion as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('IdEstado')==$value->id)? 'selected':''}}>{{ $value->estado_cotizacion}}</option>
                                        @endforeach
                                    </select>
                                    @error('IdEstado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_Estado2"></label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Modalidad</label>
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
                                <div class="col-md-6">
                                    <label for="">Etapa</label>
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
                        </div>
                        <div id="step-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Jornada</label>
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
                                    <label for="">Tipo de Concreto</label>
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
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Obra</label>
                                    <label class="validacion" id="val_Obra"></label>
                                    <select id="IdObra"  name= "IdObra" class="form-control @error('IdObra') is-invalid @enderror">
                                        <option value="0" >Seleccione una Obra</option>
                                        @foreach($obra as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('IdObra')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('IdObra')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_Obra2"></label>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Maquinaria</label>
                                    <label class="validacion" id="val_Maquinaria"></label>
                                    <select id="IdMaquinaria"  name= "IdMaquinaria" class="form-control @error('IdMaquinaria') is-invalid @enderror">
                                        <option value="0">Seleccione una Maquinaria</option>
                                        @foreach($maquinaria as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('IdMaquinaria')==$value->id)? 'selected':''}}>{{ $value->modelo}}</option>
                                        @endforeach
                                    </select>
                                    @error('IdMaquinaria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_Maquinaria2"></label>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Operario</label>
                                    <label class="validacion" id="val_Operario"></label>
                                    <select id="IdOperario"  name="IdOperario" class="form-control @error('IdOperario') is-invalid @enderror">
                                        <option value="0">Seleccione un Operario</option>
                                        @foreach($operario as $key =>$value)
                                        <option value="{{ $value->id }}" {{(old('IdOperario')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('IdOperario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_Operario2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Fecha de Cotización</label>
                                    <label class="validacion" id="val_FechaCotizacion"></label>
                                    <input type="date" class="form-control @error('FechaCotizacion') is-invalid @enderror" id="FechaCotizacion" name="FechaCotizacion" value="{{old('FechaCotizacion')}}">
                                    @error('FechaCotizacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_FechaCotizacion2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Fecha de Inicio Bombeo</label>
                                    <label class="validacion" id="val_FechaInicio"></label>
                                    <input type="date" class="form-control @error('InicioBombeo') is-invalid @enderror" id="InicioBombeo" name="InicioBombeo" value="{{old('InicioBombeo')}}">
                                    @error('InicioBombeo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_FechaInicio2"></label>
                                </div>

                            </div>
                            <div class="row mt-3">

                                <div class="col-md-4">
                                    <label for="">Ciudad</label>
                                    <label class="validacion" id="val_ciudad"></label>
                                    <input type="text" class="form-control @error('Ciudad') is-invalid @enderror" onkeypress="return soloLetras(event)" id="Ciudad" name="Ciudad" value="{{old('Ciudad')}}">
                                    @error('Ciudad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_ciudad2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Cantidad de losas</label>
                                    <label class="validacion" id="val_Losas"></label>
                                    <input type="text" class="form-control @error('Losas') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Losas" name="Losas" value="{{old('Losas')}}">
                                    @error('Losas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_Losas2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Cantidad de tuberia</label>
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
                                    <label for="">Cantidad de metros<sup>3</sup></label>
                                    <label class="validacion" id="val_Metros"></label>
                                    <input type="text" class="form-control @error('MetrosCubicos') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="MetrosCubicos" name="MetrosCubicos" >
                                    @error('MetrosCubicos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_Metros2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Valor Metro <sup>3</sup></label>
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
                                    <input type="text" class="form-control @error('AIU') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="AIU" name="AIU" readonly>
                                    @error('AIU')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_AIU2"></label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="">SubTotal</label>
                                    <label class="validacion" id="val_SubTotal"></label>
                                    <input type="text" class="form-control @error('Subtotal') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Subtotal" name="Subtotal" readonly>
                                    @error('Subtotal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_SubTotal2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">IVA al AIU</label>
                                    <label class="validacion" id="val_IvaAIU"></label>
                                    <input type="text" class="form-control @error('IvaAIU') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="IvaAIU" name="IvaAIU" readonly>
                                    @error('IvaAIU')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_IvaAIU2"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Valor Total</label>
                                    <label class="validacion" id="val_ValorTotal"></label>
                                    <input type="text" class="form-control @error('ValorTotal') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="ValorTotal" name="ValorTotal" readonly>
                                    @error('ValorTotal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="validacion" id="val_ValorTotal2"></label>
                                </div>
                            </div>
                        </div>
                        <div id="step-5" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="validationTextarea">Observaciones</label>
                                    <textarea class="form-control @error('Observaciones') is-invalid @enderror " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
                                    @error('Observaciones')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12"><label class="validacion" id="val_FechaCotizacion3"></label></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12"><label class="validacion" id="val_FechaInicio3"></label></div>
                                    <div class="col-md-12"><label class="validacion" id="val_ciudad3"></label></div>
                                    <div class="col-md-12"><label class="validacion" id="val_Losas3"></label></div>
                                    <div class="col-md-12"><label class="validacion" id="val_Tuberia3"></label></div>
                                    <div class="col-md-12"><label class="validacion" id="val_Metros3"></label></div>
                                    <div class="col-md-12"><label class="validacion" id="val_ValorMetro3"></label></div>
                                </div>
                            </div> --}}
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success float-left">Crear Cotizacion</button>
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
<div class="modal fade" id="exampleModalE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">ETAPAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @include('flash::message')
                    <table id="tbl_etapa" class="table table-bordered table-striped " style="width: 100%;">
                        <thead class="" align="center">
                        <tr>
                            <th>Etapa N°</th>
                            <th>Etapa</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalJ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">JORNADAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('flash::message')
                <table id="tbl_jornada" class="table table-bordered" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Jornada N°</th>
                        <th>Jornada</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #616A6B">
                <h5 class="modal-title" id="exampleModalLabel">MODALIDAD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('flash::message')
                <table id="tbl_modalidad" class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="" align="center">
                    <tr>
                        <th>Modalidad N°</th>
                        <th>Modalidad</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                </table
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleCotizacion.css') }}" rel="stylesheet">
@endsection
@section("scripts")

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
                        data: 'modalidad',
                        name: 'modalidad',
                    },
                    {
                        data: 'etapa',
                        name: 'etapa',
                    },
                    {
                        data: 'jornada_nombre',
                        name: 'jornada_nombre',
                    },
                    {
                        data: 'tipo_concreto',
                        name: 'tipo_concreto',
                    },
                    {
                        data: 'nombre_obra',
                        name: 'nombre_obra',
                    },
                    {
                        data: 'modelo',
                        name: 'modelo',
                    },
                    {
                        data: 'nombre',
                        name: 'nombre',
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
                        data: 'ciudad',
                        name: 'ciudad',
                    },
                    {
                        data: 'losas',
                        name: 'losas',
                    },
                    {
                        data: 'tuberia',
                        name: 'tuberia',
                    },
                    {
                        data: 'metrosCubicos',
                        name: 'metrosCubicos',
                    },
                    {
                        data: 'valorMetro',
                        name: 'valorMetro',
                    },
                    {
                        data: 'AIU',
                        name: 'AIU',
                    },
                    {
                        data: 'subtotal',
                        name: 'subtotal',
                    },
                    {
                        data: 'ivaAIU',
                        name: 'ivaAIU',
                    },
                    {
                        data: 'valorTotal',
                        name: 'valorTotal',
                    },
                    {
                        data: 'observaciones',
                        name: 'observaciones',
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
                            }
            });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
    <script src="{{ asset('assets/modal/js/modal.js') }}"></script>
    <script src="{{ asset('assets/modal/js/cotizacion.js') }}"></script>
    <script src="{{ asset('js/validacionCotizacion.js') }}"></script>
    <script src="{{ asset('js/modalesCotizacion.js') }}"></script>
@endsection



