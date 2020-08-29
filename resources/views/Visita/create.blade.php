@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Visita</strong>

        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/visita/guardar" method="POST" enctype="multipart/form-data">
        @csrf  
            <div class="row">  
            <div class="col-md-6">
                    <div class="form-group">
                    <label class="radio-inline">Tipo Visita
                    <select class="form-control @error('tipovisita') is-invalid @enderror" name="tipovisita" id="tipovisita">
                    <option value="">Seleccione</option>
                            <option value="COMERCIAL">COMERCIAL</option>
                            <option value="TECNICA">TÉCNICA</option>
                        </select>   
                        @error('tipovisita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>

                <div class="form-group col-md-3">
                        <label for="">Obra</label>
                    <select id="idobra"  name= "idobra"  class="form-control @error('idobra') is-invalid @enderror">
                            <option selected>Seleccione una Obra</option>
                            @foreach($obra as $key =>$value)
                                <option value="{{ $value->id }}" {{(old('idobra')==$value->id)? 'selected':''}}>{{ $value->nombre}}</option>
                            @endforeach
                        </select>
                        @error('idobra')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>





            <div class="col-3">
                    <div class="form-group">
                        <label for="">Encargado Visita</label>
                        <input type="text" class="form-control @error('encargadovisita') is-invalid @enderror"  name="encargadovisita" id="encargadovisita">
                        @error('encargadovisita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group col-md-2">
                        <label for="">Fecha de Cotización</label>
                        <input type="date" class="form-control @error('Fecha_Hora') is-invalid @enderror" id="FechaCotizacion" name="Fecha_Hora" value="{{old('Fecha_Hora')}}">
                        @error('Fecha_Hora')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio-inline">Viabilidad 
                    <select class="form-control" name="viabilidad" id="viabilidad">
                            <option value="NA">Seleccione</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>   
                
                          
                    </div>
                </div>
              
            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>   
        </div>
    </div>
@endsection