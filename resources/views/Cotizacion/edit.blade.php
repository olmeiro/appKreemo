@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Editar Cotización</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/cotizacion/actualizar" method="POST" name="FrmEditarCotizacion">
            @csrf
                <input type="hidden" name="id" value="{{$cotizacion->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Empresa</label>
                            <select id="IdEmpresa"  name= "IdEmpresa" class="form-control @error('IdEmpresa') is-invalid @enderror" >
                            <option selected>Seleccione una Empresa</option>
                            @foreach($empresa as $key =>$value)
                                <option {{$value->id == $cotizacion->idEmpresa ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->nombre}}</option>
                            @endforeach

                        </select>
                        @error('IdEmpresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Estado</label>
                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                            <option value="">Seleccione Estado</option>
                            <option value="1" {{ $cotizacion->idEstado == 1 ? 'selected' : '' }}>En proceso</option>
                            <option value="2" {{ $cotizacion->idEstado == 2 ? 'selected' : '' }}>Aceptada</option>
                            <option value="3" {{ $cotizacion->idEstado == 3 ? 'selected' : '' }}>Perdida</option>
                        </select>

                        @error('IdEstado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Modalidad</label>
                        <select id="IdModalidad"  name= "IdModalidad" class="form-control @error('IdModalidad') is-invalid @enderror">
                            <option selected >Seleccione un Modalidad</option>
                            <option value="1" {{ $cotizacion->idModalidad == 1 ? 'selected' : '' }}>Semanal</option>
                            <option value="2" {{ $cotizacion->idModalidad == 2 ? 'selected' : '' }}>Mensual</option>
                        </select>
                        @error('IdModalidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Etapa</label>
                        <select id="IdEtapa"  name= "IdEtapa" class="form-control @error('IdEtapa') is-invalid @enderror">
                                <option selected >Seleccione una Etapa</option>
                                <option value="1" {{ $cotizacion->idEtapa == 1 ? 'selected' : '' }}>Pilas</option>
                                <option value="2" {{ $cotizacion->idEtapa == 2 ? 'selected' : '' }}>Cimientos</option>
                        </select>
                        @error('IdEtapa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Jornada</label>
                        <select id="IdJornada"  name= "IdJornada" class="form-control @error('IdJornada') is-invalid @enderror">
                                <option selected >Seleccione un Jornada</option>
                                <option value="1" {{ $cotizacion->idJornada == 1 ? 'selected' : '' }}>Diurna</option>
                                <option value="2" {{ $cotizacion->idJornada == 2 ? 'selected' : '' }}>Nocturna</option>

                        </select>
                        @error('IdJornada')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Tipo de Concreto</label>
                        <select id="IdTipo_Concreto"  name= "IdTipo_Concreto" class="form-control @error('IdTipo_Concreto') is-invalid @enderror">
                            <option selected >Seleccione un tipo de concreto</option>
                            <option value="1" {{ $cotizacion->idTipo_Concreto == 1 ? 'selected' : '' }}>Arena</option>
                            <option value="2" {{ $cotizacion->idTipo_Concreto == 2 ? 'selected' : '' }}>Triturado</option>
                        </select>
                        @error('IdTipo_Concreto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Obra</label>
                        <select id="IdObra"  name= "IdObra" class="form-control @error('IdObra') is-invalid @enderror">
                                <option selected >Seleccione una Obra</option>
                                @foreach($obra as $key =>$value)
                                <option {{$value->id == $cotizacion->idObra ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->nombre}}</option>
                            @endforeach
                        </select>
                        @error('IdObra')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Maquinaria</label>
                        <select id="IdMaquinaria"  name= "IdMaquinaria" class="form-control @error('IdMaquinaria') is-invalid @enderror">
                                <option selected >Seleccione una maquina</option>
                                <option value="1" {{ $cotizacion->idMaquinaria == 1 ? 'selected' : '' }}>Maquinaria 1</option>
                                <option value="2" {{ $cotizacion->idMaquinaria == 2 ? 'selected' : '' }}>Maquinaria 2</option>
                        </select>
                        @error('IdMaquinaria')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Operario</label>
                        <select id="IdOperario"  name= "IdOperario" class="form-control @error('IdOperario') is-invalid @enderror">
                                <option selected >Seleccione un Operario</option>
                                <option value="1" {{ $cotizacion->idOperario == 1 ? 'selected' : '' }}>Operario 1</option>
                                <option value="2" {{ $cotizacion->idOperario == 2 ? 'selected' : '' }}>Operario 2</option>

                        </select>
                        @error('IdOperario')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Fecha de Cotización</label>
                        <input value="{{$cotizacion->fechaCotizacion}}" type="date" class="form-control @error('FechaCotizacion') is-invalid @enderror" id="FechaCotizacion" name="FechaCotizacion">
                        @error('FechaCotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Fecha de Inicio Bombeo</label>
                        <input value="{{$cotizacion->inicioBombeo}}" type="date" class="form-control @error('InicioBombeo') is-invalid @enderror" id="InicioBombeo" name="InicioBombeo" >
                        @error('InicioBombeo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Ciudad</label>
                        <input value="{{$cotizacion->ciudad}}" type="text" class="form-control @error('Ciudad') is-invalid @enderror" id="Ciudad" name="Ciudad">
                        @error('Ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Cantidad de losas</label>
                        <input  value="{{$cotizacion->losas}}" type="text" class="form-control @error('Losas') is-invalid @enderror" id="Losas" name="Losas">
                        @error('Losas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cantidad de tuberia</label>
                        <input value="{{$cotizacion->tuberia}}"  type="text" class="form-control @error('Tuberia') is-invalid @enderror" id="Tuberia" name="Tuberia">
                        @error('Tuberia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cantidad de metros<sup>3</sup></label>
                        <input value="{{$cotizacion->metrosCubicos}}"  type="text" class="form-control @error('MetrosCubicos') is-invalid @enderror" id="MetrosCubicos" name="MetrosCubicos">
                        @error('MetrosCubicos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Valor Metro <sup>3</sup></label>
                        <input value="{{$cotizacion->valorMetro}}"  type="text" class="form-control @error('ValorMetro') is-invalid @enderror  solo_numeros" id="ValorMetro" name="ValorMetro" >
                        @error('ValorMetro')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">AIU</label>
                        <input value="{{$cotizacion->AIU}}"  type="text" class="form-control @error('AIU') is-invalid @enderror solo_numeros" id="AIU" name="AIU" >
                        @error('AIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">SubTotal</label>
                        <input value="{{$cotizacion->subtotal}}"  type="text" class="form-control @error('Subtotal') is-invalid @enderror solo_numeros" id="Subtotal" name="Subtotal">
                        @error('Subtotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">IVA al AIU</label>
                        <input value="{{$cotizacion->ivaAIU}}"  type="text" class="form-control @error('IvaAIU') is-invalid @enderror  solo_numeros" id="IvaAIU" name="IvaAIU">
                        @error('IvaAIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label  for="">Valor Total</label>
                        <input value="{{$cotizacion->valorTotal}}" type="text" class="form-control @error('ValorTotal') is-invalid @enderror solo_numeros" id="ValorTotal" name="ValorTotal">
                        @error('ValorTotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="mb-3">
                    <label for="validationTextarea">Observaciones</label>
                    <textarea   class="form-control @error('Observaciones') is-invalid @enderror " id="Observaciones" name="Observaciones" placeholder="{{$cotizacion->observaciones}}" ></textarea>
                    @error('Observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-success float-left">editar Cotizacion</button>
                <a href="/cotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
<br>

</body>
@endsection
