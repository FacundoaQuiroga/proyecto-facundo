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
                            <div class="text-left view view-cascade gradient-card-header primary-color">
                                <div class="">
                                    <h5 class="font-weight-bold white-text">Tramites residente:</h5>
                                </div>
                                <br>
                                <ul><a class="font-weight-bold black-text hoverable alert alert-success" href="{{route('residentes.show', $valor_rut)}}">- Mostrar mi formulario residente</a></ul>
                                <br>
                                <!--Aqui boton solicitudes-->
                                <ul><a class="font-weight-bold black-text hoverable alert alert-success" href="{{route('residentes.solicitud', $valor_rut)}}">- Mostrar Solicitudes</a></ul>
                                <br>
                                <ul><a class="font-weight-bold black-text hoverable alert alert-success" href="{{route('residentes.subsidio', $valor_rut)}}">- Solicitar Subsidio</a></ul>

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

@endsection

