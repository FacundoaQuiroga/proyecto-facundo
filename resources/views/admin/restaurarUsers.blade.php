
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
                                <h2 class="h2-responsive mb-0 font-weight-bold">Restaurar Usuario Eliminado</h2>
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
                                                <h5 class="font-weight-bold dark-grey-text">lista de eliminados </h5>
                                            </div>
                                        </div>
                                        <!-- Card Data -->
                                        <div class="row">
                                            <div class="col">
                                                <table class="table">
                                                    <thead>
                                                    <tr class="info alert alert-info">
                                                        <th>Nombre</th>
                                                        <th>Rut</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>

                                                    @foreach($datos as $dato)
                                                        <tbody>
                                                        <tr>
                                                            <td>{{ $dato->name }}</td>
                                                            <td>{{ $dato->rut }}</td>
                                                            <td><a class="hoverable alert alert-success" href="{{route('adminUsers.recuperarUsuario', $dato->rut)}}">Restaurar</a></td>
                                                            <td><a class="hoverable alert alert-danger" href="{{route('adminUsers.eliminarUsuario', $dato->rut)}}">Eliminar definitivamente</a></td>
                                                        </tr>
                                                        </tbody>
                                                    @endforeach

                                                </table>
                                                {{$datos->links()}}
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
