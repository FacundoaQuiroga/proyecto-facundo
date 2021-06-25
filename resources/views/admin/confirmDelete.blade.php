
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
                                <h2 class="h2-responsive mb-0 font-weight-bold">Editar formulario residente : {{ $residente->nombres }}</h2>
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
                                                <h5 class="font-weight-bold dark-grey-text">Ficha de Residente </h5>
                                            </div>
                                        </div>
                                        <!-- Card Data -->
                                        <form action="{{route('admin.destroy', $residente->user_rut)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="card-body card-body-cascade">
                                                <h1></h1>
                                                <div class="row">

                                                    <div class="col-lg-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="user_rut" class="form-control form-control-sm" name="user_rut" placeholder="{{ $residente->user_rut }}" value="{{ $residente->user_rut }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form12" class="">RUT</label>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <!-- Grid column -->
                                                    <div class="col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="nombres" class="form-control form-control-sm" name="nombres" placeholder="{{ $residente->nombres }}" value="{{ $residente->nombres }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form5" class="">Nombres</label>
                                                        </div>

                                                    </div>

                                                    <!-- Grid column -->
                                                    <div class="col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="apellidos" class="form-control form-control-sm" name="apellidos"  placeholder="{{ $residente->apellidos }}" value="{{ $residente->apellidos }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form5" class="">Apellidos</label>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <!-- Grid column -->
                                                    <div class="col-lg-4 col-md-12">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="comuna" class="form-control form-control-sm" name="comuna" placeholder="{{ $residente->comuna }}" value="{{ $residente->comuna }}">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form7" class="">Comuna</label>
                                                        </div>

                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-lg-4 col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="sector" class="form-control form-control-sm" name="sector" placeholder="{{ $residente->sector }}" value="{{ $residente->sector }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form8" class="">Sector</label>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">


                                                    <!-- Grid column -->
                                                    <div class="col-lg-4 col-md-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="fecha_actualizacion" class="form-control form-control-sm" name="fecha_actualizacion" placeholder="{{ $residente->fecha_actualizacion }}" value="{{ $residente->fecha_actualizacion }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form12" class="">Certificado</label>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4 col-md-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="fecha_certificado" class="form-control form-control-sm" name="fecha_certificado" placeholder="{{ $residente->fecha_certificado }}" value="{{ $residente->fecha_certificado }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form13" class="">Fecha Certificado</label>
                                                        </div>

                                                    </div>
                                                    <!-- Grid column -->

                                                </div>

                                            </div>

                                            <button class="mt-3 btn btn-danger" type="submit" >Eliminar</button>
                                            <button class="mt-3 btn btn-warning" href="/admin" type="" >Cancelar</button>
                                            <!-- Card content -->
                                        </form>
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
