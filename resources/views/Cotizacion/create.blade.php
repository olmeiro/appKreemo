@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: black">
            <strong>Crear Cotización</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/cotizacion/guardar" method="POST" name="FrmCrearCotizacion">
            @csrf
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Empresa</label>
                        <select id="IdEmpresa"  name= "IdEmpresa"  class="form-control @error('IdEmpresa') is-invalid @enderror">
                            <option selected>Seleccione una Empresa</option>
                            @foreach($empresa as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('IdEmpresa')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                            @endforeach
                        </select>
                        @error('IdEmpresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Estado</label>
                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                            <option selected>Seleccione un Estado</option>
                            @foreach($estadocotizacion as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('IdEstado')==$value->id)? 'selected':''}}>{{ $value->estado_cotizacion}}</option>
                            @endforeach
                        </select>
                        @error('IdEstado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Modalidad</label>
                        <select id="IdModalidad"  name= "IdModalidad" class="form-control @error('IdModalidad') is-invalid @enderror">
                            <option selected>Seleccione una Modalidad</option>
                            @foreach($modalidad as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('IdModalidad')==$value->id)? 'selected':''}}>{{ $value->modalidad}}</option>
                            @endforeach
                        </select>
                        @error('IdModalidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Etapa</label>
                        <select id="IdEtapa"  name= "IdEtapa" class="form-control @error('IdEtapa') is-invalid @enderror">
                                <option selected>Seleccione una Etapa</option>
                            @foreach($etapa as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('IdEtapa')==$value->id)? 'selected':''}}>{{ $value->etapa}}</option>
                            @endforeach
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
                                <option selected>Seleccione una Jornada</option>
                            @foreach($jornada as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('IdJornada')==$value->id)? 'selected':''}}>{{ $value->jornada_nombre}}</option>
                            @endforeach
                        </select>
                        @error('IdJornada')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Tipo de Concreto</label>
                        <select id="IdTipo_Concreto"  name= "IdTipo_Concreto" class="form-control @error('IdTipo_Concreto') is-invalid @enderror">
                            <option selected>Seleccione un Tipo de Concreto</option>
                            @foreach($tipoconcreto as $key =>$value)
                            <option value="{{ $value->id }}" {{(old('IdTipo_Concreto')==$value->id)? 'selected':''}}>{{ $value->tipo_concreto}}</option>
                            @endforeach
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
                                <option value="{{ $value->id }}" {{(old('IdObra')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                                @endforeach
                        </select>
                        @error('IdObra')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">

                    </div>
                    <div class="form-group col-md-2">
                        <label for="FechaCotizacion">Fecha de Cotización</label>
                        <input type="data" data-date-format="yy-m-d" class="form-control calendarioI @error('FechaCotizacion') is-invalid @enderror " id="FechaCotizacion" name="FechaCotizacion" value="{{old('FechaCotizacion')}}">
                        @error('FechaCotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="InicioBombeo">Fecha de Inicio</label>
                        <input type="data" data-date-format="yy-m-d"  class="form-control calendarioI @error('InicioBombeo') is-invalid @enderror " id="InicioBombeo" name="InicioBombeo" value="{{old('InicioBombeo')}}">
                        @error('InicioBombeo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control @error('Ciudad') is-invalid @enderror " onkeypress="return soloLetras(event)" id="Ciudad" name="Ciudad" value="{{old('Ciudad')}}">
                        @error('Ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Cantidad de losas</label>
                        <input type="text" class="form-control @error('Losas') is-invalid @enderror"  onkeypress="return soloNumeros(event)" id="Losas" name="Losas" value="{{old('Losas')}}">
                        @error('Losas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Cantidad de tuberia</label>
                        <input type="text" class="form-control @error('Tuberia') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Tuberia" name="Tuberia" value="{{old('Tuberia')}}">
                        @error('Tuberia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="">Cantidad de metros<sup>3</sup></label>
                        <input type="text" class="form-control @error('MetrosCubicos') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="MetrosCubicos" name="MetrosCubicos" >
                        @error('MetrosCubicos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Valor Metro <sup>3</sup></label>
                        <input type="text" class="form-control @error('ValorMetro') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="ValorMetro" name="ValorMetro"  onchange="valor_total()">
                        @error('ValorMetro')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">AIU</label>
                        <input type="text" class="form-control @error('AIU') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="AIU" name="AIU" readonly>
                        @error('AIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">SubTotal</label>
                        <input type="text" class="form-control @error('Subtotal') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="Subtotal" name="Subtotal" readonly>
                        @error('Subtotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">IVA al AIU</label>
                        <input type="text" class="form-control @error('IvaAIU') is-invalid @enderror " onkeypress="return soloNumeros(event)" id="IvaAIU" name="IvaAIU" readonly>
                        @error('IvaAIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Valor Total</label>
                        <input type="text" class="form-control @error('ValorTotal') is-invalid @enderror" onkeypress="return soloNumeros(event)" id="ValorTotal" name="ValorTotal" readonly>
                        @error('ValorTotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">

                </div>
                <div class="mb-3">
                    <label for="validationTextarea">Observaciones</label>
                    <textarea class="form-control @error('Observaciones') is-invalid @enderror " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
                    @error('Observaciones')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success float-left">Crear Cotizacion</button>
                <a href="/cotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
@section("style")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
@endsection


@section("scripts")

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#FechaCotizacion", {
        minDate: "today",
        maxDate: ""
    });

    flatpickr("#InicioBombeo", {
        minDate: "today",
        maxDate: ""
    });
</script>

<script>
        function valor_total()
    {
        var cantidad = document.getElementById('MetrosCubicos').value;
        var valor = document.getElementById('ValorMetro').value;
        document.getElementById('AIU').value= (cantidad*valor)*(0.05);
        document.getElementById('Subtotal').value= (cantidad*valor);
        document.getElementById('IvaAIU').value= ((cantidad*valor)*(0.05))*(0.19);
        document.getElementById('ValorTotal').value= ((cantidad*valor)*(0.05))*(0.19)+(cantidad*valor);
    }
</script>
<script>
    $(document).ready(function(){

        $(".solo_numeros").on("keyup",function(){
            this.value = this.value.replace(/[^0-9]/g,'');
        });

        $(".solo_letras").on("keyup",function(){
            this.value = this.value.replace(/[0-9]/g,'');
        });
    });
</script>

<script>
    function soloLetras(e) {
        var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

        for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        }
    }
</script>

<script>
    function soloNumeros(e) {
        var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " 0123456789",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

        for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        }
    }
</script>


@endsection
