@extends('layouts.app')

@section('body')
 <div class="row">
    <div class="col">
        <h3>Crear Contactos De Obra</h1>
        <a href="/obracontacto/listar">Listar</a>
    </div>
</div>
<form action="/obracontacto/guardar" method="POST">
    @csrf
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="car-head">
                <h4 class="text-center">1. Información Obra</h4>
            </div>
            <div class="row card-body">
        
                <div class="form-group col-6">
                    <label for="">Empresa</label>
                    <select name="idempresa" id="idobra" class="form-control">
                        <option value="">Seleccion</option>
                        @foreach($empresa as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                        @endforeach
                    </select>           
                </div>
                <div class="form-group col-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"  name="direccion" id="direccion">
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="">Telefono</label>
                        <input type="number" class="form-control @error('telefono1') is-invalid @enderror"  name="telefono1" id="telefono1">
                        @error('telefono1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="">Correo Electrónico</label>
                        <input type="text" class="form-control @error('correo1') is-invalid @enderror"  name="correo1" id="correo1">
                        @error('correo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
        </div>

        
        <div class="col-12" style="margin-top: 5%">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>
    </div>


    <div class="col-6">
        <div class="card">
            <div class="card-head">
            <h4 class="text-center">2. Información del contacto</h4>
            </div>
            <div class="row card-body">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Seleccione Contacto</label>
                        <select name="contactos" id="contactos" class="form-control">
                            <option value="">Seleccione  Contacto</option>
                            @foreach($cliente as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" onclick="agregar_contacto()" >Agregar</button>
                </div>
            </div>
            <table class="table">
                <thead>
                        <th>Nombre</th>
                        <th>Id Tipo Contacto</th>
                    </tr>
                </thead>
                <tbody id="tblContactos">

                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
@endsection

@section("scripts")
    <script>
   

        function agregar_contacto(){

            let contacto_id = $("#contactos option:selected").val();
            let contacto_text = $("#contactos option:selected").text();


            $("#tblContactos").append(`

                <tr id="tr-${contacto_id}">
                    <td>
                        <input type="hidden" name="contacto_id[]" value="${contacto_id}" />
                        ${contacto_text}
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="eliminar_contacto(${contacto_id})">X</button>
                    </td>
                </tr>
            `);
        }

        function eliminar_contacto(id){
            $("#tr-"+id).remove();
        }
    </script>
@endsection

