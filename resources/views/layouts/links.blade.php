<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../AdminTemplate/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../../AdminTemplate/css/mdb.min.css">

    <!-- Your custom styles (optional) -->
    <style>

    </style>
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">

            <!-- Logo -->
            <li class="logo-sn waves-effect py-3" style=" background-color: #3383FF;  height: 165px;">
                <div class="text-center">
                    <a href="{{ url('/') }}" class="pl-0"><img style="height: 155px;" src="../../img/logotipo_futaleufu_2.png"></a>
                </div>
            </li>

            <!-- Search Form
            <li>
                <form class="search-form" role="search">
                    <div class="md-form mt-0 waves-light">
                        <input type="text" class="form-control py-2" placeholder="Search" disabled>
                    </div>
                </form>
            </li>
-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">

                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-user"></i>Menu<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <!--si el usuario logeado tiene rol administrador '1' entonces tendra acceso a
                                    todos los links incluidos los de residente y si no entonces tendra los de residente unicamente-->

                                @if(Auth::user() != null)
                                    @if(Auth::user()->role_id == '1')

                                        <li>
                                            <a href="/admin">listado residentes</a>
                                        </li>
                                        <li>
                                            <a href="/adminUsers">listado usuarios</a>
                                        </li>
                                        <li>
                                            <a href="/adminSubsidio">Solicitudes de subsidio</a>
                                        </li>
                                        <li>
                                            <a href="{{route('residentes.index')}}">Perfil residente</a>
                                        </li>
                                        <li>
                                            <a href="{{route('qrcode.index')}}">Codigo QR residente</a>
                                        </li>

                                        @else

                                        <li>
                                            <a href="{{route('residentes.index')}}">Perfil residente</a>
                                        </li>
                                        <li>
                                            <a href="{{route('qrcode.index')}}">Codigo QR residente</a>
                                        </li>

                                    @endif
                                @else
                                        <!--evita que el usuario tenga acceso al menu y asi se vuelve a logear para tener acceso-->
                                @endif


                            </ul>
                        </div>
                    </li>


                </ul>
            </li>
            <!-- Side navigation links -->

        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>Municipalidad Futaleufú</p>
        </div>

        <div class="d-flex change-mode">

            <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                <button class="btn btn-outline-black btn-sm" id="dark-mode">Cambiar tema</button>
            </div>

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Dropdown
                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="badge red">3</span> <i class="fas fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notificaciones</span>
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span
                            class="clearfix d-none d-sm-inline-block">Contacto</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
                            class="clearfix d-none d-sm-inline-block">Soporte</span></a>
                </li>
                -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Perfil {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->

</header>


            <!-- content guarda toda esta plantilla para reutilizarla en las demas vistas de residente-->
            @yield('content')



<!-- SCRIPTS -->
<!-- JQuery -->
<script src="../../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>

<!-- Initializations -->
<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization datepiker español
    $('.datepicker').pickadate({
        monthsFull: [ 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre' ],
        monthsShort: [ 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic' ],
        weekdaysFull: [ 'domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado' ],
        weekdaysShort: [ 'dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb' ],
        today: 'hoy',
        clear: 'borrar',
        close: 'cerrar',
        firstDay: 1,

        format: 'dd-mmmm-yyyy'
    });





    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

<script>
    $(function () {
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(0,0,0,.15)",
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: "#4CAF50",
            }, {
                label: "My Second dataset",
                fillColor: "rgba(255,255,255,.25)",
                strokeColor: "rgba(255,255,255,.75)",
                pointColor: "#fff",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(0,0,0,.15)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }]
        };


        var dataPie = [{
            value: 300,
            color: "#4caf50",
            highlight: "#66bb6a",
            label: "Google Chrome"
        }, {
            value: 50,
            color: "#03a9f4",
            highlight: "#29b6f6",
            label: "Edge"
        }, {
            value: 100,
            color: "#d32f2f",
            highlight: "#e53935",
            label: "Firefox"
        }]

        var option = {
            responsive: true,
            // set font color
            scaleFontColor: "#fff",
            // font family
            defaultFontFamily: "'Roboto', sans-serif",
            // background grid lines color
            scaleGridLineColor: "rgba(255,255,255,.1)",
            // hide vertical lines
            scaleShowVerticalLines: false,
        };

        // // Get the context of the canvas element we want to select
        // var ctx = document.getElementById("sales").getContext('2d');
        // var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.

        // // Get the context of the canvas element we want to select
        // var ctx = document.getElementById("conversion").getContext('2d');
        // var myRadarChart = new Chart(ctx).Radar(data, option);

        // Get the context of the canvas element we want to select

        //bar
        var ctxB = document.getElementById("traffic").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: ["January", "Febuary", "March", "April", "May", "June"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 255, 255, 0.3)',
                        'rgba(255, 255, 255, 0.3)',
                        'rgba(255, 255, 255, 0.3)',
                        'rgba(255, 255, 255, 0.3)',
                        'rgba(255, 255, 255, 0.3)',
                        'rgba(255, 255, 255, 0.3)'
                    ],
                    borderColor: [
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    labels: {
                        fontColor: "white"
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: "white"
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white"
                        }
                    }]
                }
            }
        });

        //pie
        var ctxP = document.getElementById("doughnutChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'doughnut',
            data: {
                labels: ["March", "April", "May", "June"],
                datasets: [{
                    data: [160, 50, 80, 60],
                    backgroundColor: ["#4285F4", "#ffbb33", "#29b6f6", "#FF5252"],
                    hoverBackgroundColor: ["#6ea0f2", "#fec451", "#52c3f6", "#fa6e6e"]
                }]
            },
            options: {
                responsive: true
            }
        });

    });

</script>

<script>
    $(function () {
        $('.min-chart#chart-sales').easyPieChart({
            barColor: "#4caf50",
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    });

    $(function () {
        $('#dark-mode').on('click', function (e) {

            e.preventDefault();

            $('footer, .card').toggleClass('dark-card-admin');
            $('body, .navbar').toggleClass('white-skin navy-blue-skin');
            $(this).toggleClass('white text-dark btn-outline-black');
            $('body').toggleClass('dark-bg-admin');
            $('h6, .card, p, td, th, i, li a, h4, input, label').not(
                '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
            $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
            $('.gradient-card-header').toggleClass('white black lighten-4');
            $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

        });
    });

</script>

</body>
</html>
