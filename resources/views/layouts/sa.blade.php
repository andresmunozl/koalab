<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bamboo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">

    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<div id="app">
    <div class="container-fluid" id="wrapper">
        <div class="row">
            <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
                <h1 class="site-title"><a href="#"><em class="fa fa-bomb"></em> Bamboo</a></h1>

                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
                <ul class="nav nav-pills flex-column sidebar-nav">
                    <li class="nav-item"><a class="nav-link " href="#/sa"><em class="fa fa-dashboard"></em> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#/sa/colleges"><em class="fa fa-calendar-o"></em>Colegios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#/sa/users"><em class="fa fa-bar-chart"></em>Usuarios</a></li>
                    {{--<li class="nav-item"><a class="nav-link" href="#/admin/progra"><em class="fa fa-bar-chart"></em>Programación</a></li>--}}

                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            <em class="fa fa-power-off"></em>  {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                {{--<a href="#" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>--}}


            </nav>
            <main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
                <header class="page-header row justify-center">
                    <div class="col-md-6 col-lg-8" >
                        {{--<h1 class="float-left text-center text-md-left">Dashboard</h1>--}}
                        <img class="img-fluid" alt="Responsive image"  src="assets/img/logomin.png">

                    </div>
                    <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/profile-pic.jpg" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
                            <div class="username mt-1">
                                <h4 class="mb-1">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
                                <h6 class="text-muted">{{ Auth::user()->rol }}</h6>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> Ver perfil</a>
                            <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> Preferencias</a>
                            {{-- <a class="dropdown-item" href="#"><em class="fa fa-power-off mr-1"></em> Logout</a></div> --}}
                    </div>
                    <div class="clear"></div>
                </header>
                <section class="row">
                    <div class="col-md-12">
                        <section class="row">
                            @yield('content')
                        </section>
                        {{--<section class="row">
                            <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div>
                        </section>--}}
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

</body>
</html>
