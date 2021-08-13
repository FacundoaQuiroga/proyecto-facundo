
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
                                                <h5 class="font-weight-bold dark-grey-text">Solicitud de subsidio </h5>
                                            </div>
                                        </div>
                                        <!--  route('subsidios.store') }} -->
                                        <form action="/residentes/{{$residente->user_rut}}/subsidio" method="POST">
                                            @csrf
                                            <div class="card-body card-body-cascade">

                                                <div class="row">

                                                    <!-- le puse hidden ha las columnas que necesito insertar pero no quiero que modifiquen datos los usuarios -->

                                                    <div hidden class="col-lg-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="form12" class="form-control form-control-sm" name="rut" placeholder="{{ Auth::user()->rut }}" value="{{Auth::user()->rut}}" >
                                                            <label for="form12" class="">RUT</label>
                                                        </div>

                                                    </div>

                                                    <div hidden class="col-lg-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="form3" class="form-control form-control-sm" name="email" placeholder="{{ Auth::user()->email }}" value="{{Auth::user()->email}}" >
                                                            <label for="form3" class="">Email</label>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <!-- Grid column -->
                                                    <div hidden class="col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="form5" class="form-control form-control-sm" name="nombres" placeholder="{{ $residente->nombres }}" value="{{ $residente->nombres }}" >
                                                            <label for="form5" class="">Nombres</label>
                                                        </div>

                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div hidden class="col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="form5" class="form-control form-control-sm" name="apellidos" placeholder="{{ $residente->apellidos }}" value="{{ $residente->apellidos }}" >
                                                            <label for="form5" class="">Apellidos</label>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="row">


                                                    <div class="col-lg-4 col-md-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <select name="subsidio" class="browser-default custom-select">
                                                                <option selected value="aereo">aereo</option>
                                                                <option value="terrestre">terrestre</option>
                                                                <option value="maritimo">maritimo</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4 col-md-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <select name="tramo" class="browser-default custom-select">
                                                                <option selected value="chaiten-puertomontt">chaiten-puertomontt</option>
                                                                <option value="puertomontt-chaiten">puertomontt-chaiten</option>
                                                            </select>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4 col-md-4">

                                                        <div id="date-picker-example" class="md-form md-outline input-with-post-icon" inline="true">
                                                            <input name="fechaViaje" placeholder="Seleccione fecha"  type="text"  id="datepicker" class="form-control datepicker" required>
                                                            <label>Fecha de viaje</label>
                                                            <i class="fas fa-calendar input-prefix"></i>
                                                        </div>
                                                        <!--
                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="form13" class="form-control form-control-sm" name="fechaViaje" placeholder="15-mar-21" >
                                                            <label for="form13" class="">Fecha de viaje</label>
                                                        </div>
                                                        -->

                                                    </div>

                                                </div>


                                                    @if(session()->has('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session()->get('error') }}
                                                        </div>
                                                    @endif

                                                    @if(isset($errors) && $errors->any())

                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>

                                                    @endif

                                                    @if(Session::has('success'))
                                                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                                                    @endif

                                            </div>


                                            <button class="mt-3 btn btn-primary" type="submit" >Enviar</button>

                                        </form>

                                    </div>

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
