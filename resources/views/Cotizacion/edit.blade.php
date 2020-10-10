@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Editar cotización</strong><strong class="float-right" >Cotizacion N° {{$cotizacion->id}}</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/cotizacion/actualizar" method="POST" name="FrmEditarCotizacion" id="FrmEditarCotizacion">
            @csrf
                <input type="hidden" name="id" value="{{$cotizacion->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Empresa</label>
                        <label class="validacion" id="val_empresa"></label>
                            <select id="IdEmpresa"  name= "IdEmpresa" class="form-control @error('IdEmpresa') is-invalid @enderror" >
                            <option value="0">Seleccione</option>
                            @foreach($empresa as $key =>$value)
                                <option {{$value->id == $cotizacion->idEmpresa ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->nombre}}</option>
                            @endforeach
                        </select>
                        @error('IdEmpresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_empresa2"></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Estado</label>
                        <label class="validacion" id="val_Estado"></label>
                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                            <option value="0">Seleccione</option>
                            {{-- <option value="1" {{ $cotizacion->idEstado == 1 ? 'selected' : '' }}>En proceso</option>
                            <option value="2" {{ $cotizacion->idEstado == 2 ? 'selected' : '' }}>Aceptada</option>
                            <option value="3" {{ $cotizacion->idEstado == 3 ? 'selected' : '' }}>Perdida</option> --}}
                            @foreach($estadocotizacion as $key =>$value)
                                <option {{$value->id == $cotizacion->idEstado ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->estado_cotizacion}}</option>
                            @endforeach
                        </select>
                        @error('IdEstado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Estado2"></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Modalidad</label>
                        <label class="validacion" id="val_Modalidad"></label>
                        <select id="IdModalidad"  name= "IdModalidad" class="form-control @error('IdModalidad') is-invalid @enderror">
                            <option value="0" >Seleccione</option>
                            @foreach($modalidad as $key =>$value)
                                <option {{$value->id == $cotizacion->idModalidad ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->modalidad}}</option>
                            @endforeach
                        </select>
                        @error('IdModalidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Modalidad2"></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Etapa</label>
                        <label class="validacion" id="val_Etapa"></label>
                        <select id="IdEtapa"  name= "IdEtapa" class="form-control @error('IdEtapa') is-invalid @enderror">
                                <option value="0" >Seleccione</option>
                                @foreach($etapa as $key =>$value)
                                <option {{$value->id == $cotizacion->idEtapa ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->etapa}}</option>
                                @endforeach
                        </select>
                        @error('IdEtapa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Etapa2"></label>
                    </div>
                </div>
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Jornada</label>
                        <label class="validacion" id="val_Jornada"></label>
                        <select id="IdJornada"  name= "IdJornada" class="form-control @error('IdJornada') is-invalid @enderror">
                                <option value="0" >Seleccione</option>
                                @foreach($jornada as $key =>$value)
                                <option {{$value->id == $cotizacion->idJornada ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->jornada_nombre}}</option>
                                @endforeach
                        </select>
                        @error('IdJornada')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Jornada2"></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Tipo de Concreto</label>
                        <label class="validacion" id="val_TipoConcreto"></label>
                        <select id="IdTipo_Concreto"  name= "IdTipo_Concreto" class="form-control @error('IdTipo_Concreto') is-invalid @enderror">
                            <option value="0" >Seleccione</option>
                            @foreach($tipoconcreto as $key =>$value)
                                <option {{$value->id == $cotizacion->idTipo_Concreto ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->tipo_concreto}}</option>
                            @endforeach
                        </select>
                        @error('IdTipo_Concreto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_TipoConcreto2"></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Obra</label>
                        <label class="validacion" id="val_Obra"></label>
                        <select id="IdObra"  name= "IdObra" class="form-control @error('IdObra') is-invalid @enderror">
                                <option value="0">Seleccione</option>
                                @foreach($obra as $key =>$value)
                                <option {{$value->id == $cotizacion->idObra ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->nombre}}</option>
                            @endforeach
                        </select>
                        @error('IdObra')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Obra2"></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Ciudad</label>
                        <label class="validacion" id="val_ciudad"></label>
                        <input value="{{$cotizacion->ciudad}}" type="text" class="form-control @error('Ciudad') is-invalid @enderror" onkeypress="return soloLetras(event)" id="Ciudad" name="Ciudad">
                        @error('Ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_ciudad2"></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Fecha de cotización</label>
                        <input value="{{$cotizacion->fechaCotizacion}}" type="date" class="form-control @error('FechaCotizacion') is-invalid @enderror" id="FechaCotizacion" name="FechaCotizacion" readonly>
                        @error('FechaCotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Fecha de Bombeo</label>
                        <input value="{{$cotizacion->inicioBombeo}}" type="date" class="form-control @error('InicioBombeo') is-invalid @enderror" id="InicioBombeo" name="InicioBombeo" >
                        @error('InicioBombeo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Ciudad</label>
                        <label class="validacion" id="val_ciudad"></label>
                        <input value="{{$cotizacion->ciudad}}" type="text" class="form-control @error('Ciudad') is-invalid @enderror" onkeypress="return soloLetras(event)" id="Ciudad" name="Ciudad">
                        @error('Ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_ciudad2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Cantidad de losas</label>
                        <label class="validacion" id="val_Losas"></label>
                        <input  value="{{$cotizacion->losas}}" type="text" class="form-control @error('Losas') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Losas" name="Losas">
                        @error('Losas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Losas2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Cantidad de tuberia</label>
                        <label class="validacion" id="val_Tuberia"></label>
                        <input value="{{$cotizacion->tuberia}}"  type="text" class="form-control @error('Tuberia') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Tuberia" name="Tuberia">
                        @error('Tuberia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Tuberia2"></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="">Cantidad de metros<sup>3</sup></label>
                        <label class="validacion" id="val_Metros"></label>
                        <input value="{{$cotizacion->metrosCubicos}}"  type="text" class="form-control @error('MetrosCubicos') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="MetrosCubicos" name="MetrosCubicos">
                        @error('MetrosCubicos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_Metros2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Valor metro <sup>3</sup></label>
                        <label class="validacion" id="val_ValorMetro"></label>
                        <input value="{{$cotizacion->valorMetro}}"  type="text" class="form-control @error('ValorMetro') is-invalid @enderror  solo_numeros" onkeypress="return soloNumeros(event)" id="ValorMetro" name="ValorMetro" onchange="valor_total()">
                        @error('ValorMetro')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_ValorMetro2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">AIU</label>
                        <label class="validacion" id="val_AIU"></label>
                        <input value="{{$cotizacion->AIU}}"  type="text" class="form-control @error('AIU') is-invalid @enderror solo_numeros" id="AIU" name="AIU" readonly>
                        @error('AIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_AIU2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Subtotal</label>
                        <label class="validacion" id="val_SubTotal"></label>
                        <input value="{{$cotizacion->subtotal}}"  type="text" class="form-control @error('Subtotal') is-invalid @enderror solo_numeros" id="Subtotal" name="Subtotal" readonly>
                        @error('Subtotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_SubTotal2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">IVA al AIU</label>
                        <label class="validacion" id="val_IvaAIU"></label>
                        <input value="{{$cotizacion->ivaAIU}}"  type="text" class="form-control @error('IvaAIU') is-invalid @enderror  solo_numeros" id="IvaAIU" name="IvaAIU" readonly>
                        @error('IvaAIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_IvaAIU2"></label>
                    </div>
                    <div class="form-group col-md-2">
                        <label  for="">Valor total</label>
                        <label class="validacion" id="val_ValorTotal"></label>
                        <input value="{{$cotizacion->valorTotal}}" type="text" class="form-control @error('ValorTotal') is-invalid @enderror solo_numeros" id="ValorTotal" name="ValorTotal" readonly>
                        @error('ValorTotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="validacion" id="val_ValorTotal2"></label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationTextarea">Observaciones</label>
                    <textarea   class="form-control @error('Observaciones') is-invalid @enderror " id="Observaciones" name="Observaciones" placeholder="" >{{$cotizacion->observaciones}}</textarea>
                    @error('Observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary float-left">Editar Cotizacion</button>
                <a href="/cotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet"> --}}
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('js/validacionEditarCotizacion.js') }}"></script>
@endsection
