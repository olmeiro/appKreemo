@extends('layouts.app')

@section('body')
<div class="container row justify-content-center">
    <div class="card">
        <div class="card-header text-white float-right" style="background-color: #616A6B" >
            <strong>Tipo contactos</strong>
            <a href="/tipocontacto/crear" class="btn btn-outline-light float-right">Crear tipo contacto</a>
            <a href="/cliente" class="btn btn-outline-light float-right">Volver a contactos</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_tipocontacto" class="table table-bordered table-striped table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo contacto</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("scripts")

    <script>
        $('#tbl_tipocontacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/tipocontacto/listar',
                columns: [
                    {
                     data: 'id',
                     name: 'id'
                    },
                    {
                     data: 'tipocontacto',
                     name: 'tipocontacto'
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    }
                    // {
                    //     data: 'eliminar',
                    //     name: 'eliminar',
                    //     orderable: false,
                    //     searchable: false
                    // }
                ]
            });

    </script>
@endsection

