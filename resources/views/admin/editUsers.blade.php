
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
                                <h2 class="h2-responsive mb-0 font-weight-bold">Editar usuario : {{ $user->name }}</h2>
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
                                                <h5 class="font-weight-bold dark-grey-text">Ficha de Usuario </h5>
                                            </div>
                                        </div>
                                        <!-- Card Data -->
                                        <form action="/adminUsers/{{$user->rut}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="card-body card-body-cascade">
                                                <h1></h1>
                                                <div class="row">

                                                    <div class="col-lg-4">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="rut" class="form-control form-control-sm" name="rut" placeholder="{{ $user->rut }}" value="{{ $user->rut }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form12" class="">RUT</label>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <!-- Grid column -->
                                                    <div class="col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="name" class="form-control form-control-sm" name="name" placeholder="{{ $user->name }}" value="{{ $user->name }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form5" class="">Nombre</label>
                                                        </div>

                                                    </div>

                                                    <!-- Grid column -->
                                                    <div class="col-md-6">

                                                        <div class="md-form form-sm mb-0">
                                                            <input type="text" id="email" class="form-control form-control-sm" name="email"  placeholder="{{ $user->email }}" value="{{ $user->email }}" >
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form5" class="">Email</label>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6">

                                                        <div class="md-form form-sm mb-0">

                                                        <!-- <div class="btn-group">
                                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Elegir Rol
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" >Administrador</a>
                                                                    <a class="dropdown-item" >Residente</a>
                                                                    <a class="dropdown-item" >Validador</a>
                                                                </div>
                                                            </div> -->

                                                             <input type="text" id="rol_id" class="form-control form-control-sm" name="rol_id"  placeholder="{{ $user->role_id }}" value="{{ $user->role_id }}" >


                                                            <input type="hidden" name="_method" value="PUT">
                                                            <label for="form5" class="">Rol</label>

                                                        </div>


                                                    </div>


                                                </div>


                                            </div>

                                            <button class="mt-3 btn btn-primary" type="submit" >Enviar</button>
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
