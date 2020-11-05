<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>Kreemo App</title>
        <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Main styles for this application-->
        <link href="{{ asset('assets/dashboard/css/style.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('assets/dashboard/css/styleimg.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/styleLand.css') }}" rel="stylesheet">
    </head>
    <body class="c-app flex-row align-items-center miImg">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                <div class="card-body">
                    <h1 align="center">Inicio de sesión</h1>
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <br>
                            <div class="form-group row">
                            <b><label for="email" class="">{{ __('E-Mail Address') }}</label></b>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                            <b><label for="password" class="">{{ __('Password') }}</label></b>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                            </div> -->

                            <div  align="center">
                                <div>
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Ingresar') }}
                                    </button>
                                </div>
                                <div class="col-md-8">
                                @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidó su contraseña?') }}
                                        </a>
                                    @endif
                            </div>
                            </div>

                        </form>
                </div>
                </div>
                <div class="card text-white bg-secondary py-5 d-md-down-none" style="width:20%">
                <div class="card-body text-center">
                    <img src="{{ asset('img/kreemo.png') }}" style="width:300px;">
                    {{-- <div>
                    <h2 class="text-body">Registrar!</h2>
                    <p class="text-dark">Registrar nuevo usuario.</p>
                    <a href="/register" class="btn btn-lg btn-outline-dark mt-3">Register Now!</a>
                    </div> --}}
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="{{ asset('assets/dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
        <!--<![endif]-->

    </body>
</html>
