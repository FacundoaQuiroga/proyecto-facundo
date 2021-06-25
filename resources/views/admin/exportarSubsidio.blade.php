
@extends('layouts.linksAdmin')

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
                                <h2 class="h2-responsive mb-0 font-weight-bold">Exportar Subsidios</h2>
                            </div>


                        </div>

                        <div class="col-xl-12 col-md-12 mb-4">

                            <!-- Chart -->
                            <div class="view gradient-card-header primary-color">
                                <div class="container col-md-10 mb-4">

                                    <!-- Card -->
                                    <div class="card card-cascade cascading-admin-card user-card">

                                        <!-- Card Data -->
                                        <div class="admin-up d-flex justify-content-start">
                                            <i class="fas fa-users info-color py-4 mr-3 z-depth-2"></i>
                                            <div class="data">
                                                <h5 class="font-weight-bold dark-grey-text">Exporte archivo en formato Excel</h5>
                                            </div>
                                        </div>
                                        <!-- Card Data -->
                                        <div class="row">
                                            <div class="col">
                                                <table class="table">
                                                    <br>
                                                    <form action="{{route('admin.exportarSubsidio')}}" method="post">
                                                        @csrf

                                                        <div class="alert alert-info py-4 d-flex justify-content-start ">

                                                            <div class="col-lg-3">
                                                                <label>Elegir año para exportar</label>
                                                                <select name="fecha" class="browser-default custom-select">
                                                                    <option selected value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2026">2026</option>
                                                                    <option value="2027">2027</option>
                                                                    <option value="2028">2028</option>
                                                                </select>
                                                            </div>

                                                            <div class="d-flex justify-content-start mt-8">
                                                                <i class=" info-color py-4 mr-3 z-depth-2"></i>
                                                                <button type="submit" class="hoverable alert alert-primary" href="">Exportar subsidios como excel</button>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card -->

                                </div>
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
