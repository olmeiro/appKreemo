@extends('layouts.app')
@section('body')
<div class="container">
    <div class="row justify-content-center">
            <div class="card" style="margin-top:90px">
                <div class="card-body" align="center" >
                <h2><b>BIENVENIDO</b></h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="img/logovinicol.jpg" class="logo"  width="100%" height="100%">
                </div>
    </div>
</div>
@endsection
@section('style')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@endsection

