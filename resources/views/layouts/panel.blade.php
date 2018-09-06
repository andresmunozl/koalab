<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">
    <title>Bamboo</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bamboo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="assets/panel/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/panel/css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/panel/css/style.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid" id="wrapper">
    <div class="row">
        <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
            <h1 class="site-title"><a href="index.html"><em class="fa fa-rocket"></em> Brand.name</a></h1>

            <a href="d#/menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
            <ul class="nav nav-pills flex-column sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="index.html"><em class="fa fa-dashboard"></em> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="widgets.html"><em class="fa fa-calendar-o"></em> Widgets</a></li>
                <li class="nav-item"><a class="nav-link active" href="charts.html"><em class="fa fa-bar-chart"></em> Charts <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="buttons.html"><em class="fa fa-hand-o-up"></em> Buttons</a></li>
                <li class="nav-item"><a class="nav-link" href="forms.html"><em class="fa fa-pencil-square-o"></em> Forms</a></li>
                <li class="nav-item"><a class="nav-link" href="cards.html"><em class="fa fa-clone"></em> Cards</a></li>
            </ul>

            <a href="#" class="logout-button"><em class="fa fa-power-off"></em> Signout</a></nav>
        <main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
            <header class="page-header row justify-center">
                <div class="col-md-6 col-lg-8" >
                    <h1 class="float-left text-center text-md-left">Charts</h1>
                </div>
                <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/profile-pic.jpg" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
                        <div class="username mt-1">
                            <h4 class="mb-1">Username</h4>
                            <h6 class="text-muted">Super Admin</h6>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> Ver Perfil</a>
                        <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> Preferencias</a>
                        {{-- <a class="dropdown-item" href="#"><em class="fa fa-power-off mr-1"></em> Logout</a></div> --}}
                </div>
                <div class="clear"></div>
            </header>
            <section class="row">
                @yield('content')

            </section>
            <section class="row">
                <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div>
            </section>
    </main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="assets/panel/dist/js/bootstrap.min.js"></script>

<script src="assets/panel/js/chart.min.js"></script>
<script src="assets/panel/js/chart-data.js"></script>
<script src="assets/panel/js/easypiechart.js"></script>
<script src="assets/panel/js/easypiechart-data.js"></script>
<script src="assets/panel/js/bootstrap-datepicker.js"></script>
<script src="assets/panel/js/custom.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>


</body>
</html>
