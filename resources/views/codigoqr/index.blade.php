
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

                                                    @if($subsidio->estado == null)
                                                        <input type="text" id="form11" class="form-control form-control-sm" placeholder="inhabilitado" disabled>
                                                    @else
                                                        <input type="text" id="form11" class="form-control form-control-sm" placeholder="{{ $subsidio->estado }}" disabled>
                                                    @endif

                                                    <label for="form11" class="">Subsidio</label>
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

@endsection
