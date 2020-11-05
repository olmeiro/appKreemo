<!DOCTYPE html>
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
    <link rel="icon" type="image/png" href="{{ asset ('img/kreemo.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('dashboard/assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('dashboard/assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('dashboard/assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard/assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/dashboard/assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('dashboard/assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('dashboard/assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('dashboard/assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('dashboard/assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('dashboard/assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('dashboard/assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    @yield("meta")
    <link href="{{ asset('assets/dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/datatables.min.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    @yield("style")
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show kreemo-sidebar" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="center">
        {{-- <img src="{{ asset('img/kreemo.png') }}" style="width:50px;"> --}}
        <img src="{{ asset('img/vinicol3.png') }}" style="width:55px;">
        {{-- <img src="{{ asset('img/vinicol2.png') }}" style="width:210px;"> --}}
        <svg class="c-sidebar-brand-full align-justify " width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
        </div>
        <ul class="c-sidebar-nav">
        @if(Auth::check())
        @foreach(App\Models\User::$menu[Auth::user()->rol_id] as $value)
            @if(isset($value["hijos"]))
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="{{$value['icono']}}"></i>{{$value["nombre"]}}</a>
            <ul class="c-sidebar-nav-dropdown-items">
                @foreach($value["hijos"] as $hijo)
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{$hijo['url']}}"><span class="c-sidebar-nav-icon"></span> {{$hijo['nombre']}}</a></li>
                @endforeach
            </ul>
            </li>
            @else
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{$value['url']}}">
            <i class="{{$value['icono']}}"></i>{{$value['nombre']}}</a></li>
            @endif
        @endforeach
        @endif
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <i class="fas fa-align-justify"></i>
        </button><a class="c-header-brand d-lg-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
          </svg></a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <i class="fas fa-align-justify"></i>
        </button>
        <ul class="c-header-nav d-md-down-none">
          <li class="c-header-nav-item px-3"><a class="c-header-nav-link">Kreemo</a></li>
        </ul>
        <ul class="c-header-nav ml-auto mr-4">
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar"></div>
              <img src="{{ asset('img/vinicol.png') }}" style="width:50px;" data-toggle="tooltip" data-placement="left" title="{{ auth()->user()->name }} {{ auth()->user()->lastname }}  {{ auth()->user()->email }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-2">
            <div class="dropdown-item">
              <h5><i class="fas fa-user" style="margin-right:5px;"> </i>{{ auth()->user()->name  }} {{ auth()->user()->lastname  }} </h5>
            </div>
                <div class="dropdown-header bg-light py-2"><strong>Ayuda</strong></div>
                <a class="dropdown-item" href="/manual">
                <i class="fas fa-question-circle"></i>  Manual de usuario</a>
                <hr style="border-color:red;">
                <a class="dropdown-item" href="javascript:document.getElementById('logout').submit()">
                <svg class="c-icon mr-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg>
                <i class="fas fa-sign-out-alt"></i>  Salir</a>
                <form action="{{ route('logout')}}" id="logout" style="display:none" method="POST">@csrf</form>
            </div>
          </li>
        </ul>
      </header>
      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in">
            @yield("body")
            </div>
          </div>
        </main>
        <footer class="c-footer">
          <div><a href="https://coreui.io"></a> Kreemo app 2020 </div>
          <div class="ml-auto">Desarrollado por&nbsp;Kreemo</div>
        </footer>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('assets/dashboard/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="{{ asset('js/manuales.js') }}"></script>
    @yield("scripts")
</body>
</html>
