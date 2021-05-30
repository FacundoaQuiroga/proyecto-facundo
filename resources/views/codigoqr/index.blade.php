
@extends('layouts.links')

@section('content')
    <!-- Main Navigation -->

    <!-- Main layout -->
    <main>

        <div class="container-fluid">

            <!-- Section: Analytical panel -->
            <section class="mt-md-4 pt-md-2 mb-5">

                <!-- Card -->
                <div class="card card-cascade narrower">

                    <!-- Section: Chart -->
                    <section>

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-xl-5 col-md-12 mr-0">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                            @endif
                            <!-- Card image -->
                                <div class="view view-cascade gradient-card-header primary-color">
                                    <h2 class="h2-responsive mb-0 font-weight-bold">Bienvenido : {{ Auth::user()->name }}</h2>
                                </div>


                            </div>

                            <div class="col-xl-7 col-md-12 mb-4">

                                <!-- Chart -->
                                <div class="view gradient-card-header primary-color">
                                    <div class="">
                                        <h5 class="font-weight-bold white-text">Codigo qr:</h5>
                                    </div>
                                    <div class="text-center">
                                        {{$datoqr}}
                                    </div>

                                    <div class=" gradient-card-header primary-color">
                                        <div class="container col-md-12 mb-4">

                                            <!-- Card -->
                                            <div class="card card-cascade cascading-admin-card user-card">

                                    <div class="card-body card-body-cascade">
                                        <h1></h1>
                                        <!-- Grid row -->
                                        <div class="row">

                                            <!-- Grid column -->
                                            <div class="col-lg-4">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form12" class="form-control form-control-sm" placeholder="{{ Auth::user()->rut }}" disabled>
                                                    <label for="form12" class="">RUT</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                            <!-- Grid column -->
                                            <div class="col-lg-4">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form3" class="form-control form-control-sm" placeholder="{{ Auth::user()->email }}" disabled>
                                                    <label for="form3" class="">Email</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                            <!-- Grid column -->
                                            <div class="col-lg-4">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form4" class="form-control form-control-sm" disabled>
                                                    <label for="form4" class="disabled">Tipo de Usuario</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                        </div>
                                        <!-- Grid row -->

                                        <!-- Grid row -->
                                        <div class="row">

                                            <!-- Grid column -->
                                            <div class="col-md-6">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form5" class="form-control form-control-sm" placeholder="{{ $datoresidente->nombres }}" disabled>
                                                    <label for="form5" class="">Nombres</label>
                                                    <label for="form5" class="">Nombres</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                            <!-- Grid column -->
                                            <div class="col-md-6">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form5" class="form-control form-control-sm" placeholder="{{ $datoresidente->apellidos }}" disabled>
                                                    <label for="form5" class="">Apellidos</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                        </div>

                                        <div class="row">

                                            <!-- Grid column -->
                                            <div class="col-lg-4 col-md-12">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form7" class="form-control form-control-sm" placeholder="{{ $datoresidente->comuna }}" disabled>
                                                    <label for="form7" class="">Comuna</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                            <!-- Grid column -->
                                            <div class="col-lg-4 col-md-6">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form8" class="form-control form-control-sm" placeholder="{{ $datoresidente->sector }}" disabled>
                                                    <label for="form8" class="">Sector</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->
                                        </div>
                                        <!-- Grid row -->

                                        <!-- Grid row -->

                                        <!-- Grid row -->
                                        <div class="row">

                                            <!-- Grid column -->
                                            <div class="col-lg-4 col-md-4">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form11" class="form-control form-control-sm" disabled>
                                                    <label for="form11" class="">Subcidio de Transporte</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->


                                            <!-- Grid column -->
                                            <div class="col-lg-4 col-md-4">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form12" class="form-control form-control-sm" placeholder="{{ $datoresidente->fecha_actualizacion }}" disabled>
                                                    <label for="form12" class="">Certificado</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->
                                            <!-- Grid column -->
                                            <div class="col-lg-4 col-md-4">

                                                <div class="md-form form-sm mb-0">
                                                    <input type="text" id="form13" class="form-control form-control-sm" placeholder="{{ $datoresidente->fecha_certificado }}" disabled>
                                                    <label for="form13" class="">Fecha Certificado</label>
                                                </div>

                                            </div>
                                            <!-- Grid column -->

                                        </div>
                                        <!-- Grid row -->

                                        <!-- Grid row -->

                                        <!-- Grid row -->



                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <canvas id="" height="170px"></canvas>

                                </div>

                            </div>

                        </div>
                        <!-- Grid row -->

                    </section>
                    <!-- Section: Chart -->

                </div>
                <!-- Card -->

            </section>
            <!-- Section: Analytical panel -->

            <!-- Section: data tables -->

            <!-- Section: data tables -->

        </div>

    </main>
    <!-- Main layout -->

    <!-- Footer -->
    <footer class="page-footer pt-0 mt-5 rgba-stylish-light">

        <!-- Copyright
        <div class="footer-copyright py-3 text-center">
            <div class="container-fluid">
                © 2019 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
            </div>
        </div>
     -->
    </footer>
    <!-- Footer -->

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

        // Data Picker Initialization
        $('.datepicker').pickadate();

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

@endsection
