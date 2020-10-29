@extends('manual.index')

@section('body2')
<div class="container">
    <h2>Clientes</h2>
    <div class="card-deck">
        {{-- <div class="card mb-3" style="max-width: 300px;">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">creación de usuario</h5>
                        <p class="card-text">En el video podras ver paso a paso la forma de crear un nuevo usuario.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <iframe width="600" height="300" src="https://www.youtube.com/embed/VBpTAK-D_sw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div> --}}

        <div class="card" style="max-width: 450px;">
            <iframe width="450" height="300" src="https://www.youtube.com/embed/VBpTAK-D_sw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="card-body">
                <h5 class="card-title">creación de usuario</h5>
                <p class="card-text">En el video podras ver paso a paso la forma de crear un nuevo usuario.</p>
            </div>
        </div>
        <div class="card" style="max-width: 450px;">
            <iframe width="450" height="300" src="https://www.youtube.com/embed/VBpTAK-D_sw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="card-body">
                <h5 class="card-title">creación de usuario</h5>
                <p class="card-text">En el video podras ver paso a paso la forma de crear un nuevo usuario.</p>
            </div>
        </div>
    </div>
</div>
@endsection
