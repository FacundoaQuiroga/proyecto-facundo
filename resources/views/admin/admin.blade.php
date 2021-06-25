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
                                    <h2 class="h2-responsive mb-0 font-weight-bold">listado residentes</h2>
                                </div>


                            </div>

                            <div class="col-xl-12 col-md-12 mb-4">

                                <!-- Chart -->
                                <div class="view gradient-card-header primary-color">
                                    <div class="container col-md-11 mb-4">


                                        <!-- Card -->
                                        <div class="card card-cascade cascading-admin-card user-card">

                                            <form class="container form-inline mt-4" role="search">
                                                <div class="input-group input-group-lg">
                                                    <input class="form-control form-control-navbar" type="search"  name="search" placeholder="Buscar" >

                                                    <div class="input-group-append">
                                                        <button class="btn btn-navbar" type="submit">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                            <h6>
                                                @if($search)
                                                <div class="alert alert-primary" role="alert">
                                                    Los resultados para tu busqueda '{{ $search }}' son:
                                                </div>
                                                @endif
                                            </h6>

                                            <!-- Card Data -->
                                            <div class="d-flex justify-content-start">
                                                <i class=" info-color py-4 mr-3 z-depth-2"></i>
                                                <a class="hoverable alert alert-warning" href="{{route('admin.restaurar')}}">Lista de residentes eliminados</a>
                                            </div>

                                            <div class="d-flex justify-content-start">
                                                <i class=" info-color py-4 mr-3 z-depth-2"></i>
                                                <a class="hoverable alert alert-success" href="{{route('admin.importar')}}">Importar Residentes</a>
                                            </div>

                                            <div class="d-flex justify-content-start">
                                                <i class=" info-color py-4 mr-3 z-depth-2"></i>
                                                <a class="hoverable alert alert-success" href="{{route('admin.exportar.excel')}}">Exportar Residentes</a>
                                            </div>

                                            <!--
                                            <div class="d-flex justify-content-start">
                                                <i class=" info-color py-4 mr-3 z-depth-2"></i>
                                                <a class="hoverable alert alert-success" href="{{route('admin.actualizar')}}">Actualizar Residentes</a>
                                            </div>
                                            -->

                                            <div class="row">
                                                <div class="col">
                                                    <table class="table">

                                                        @foreach($datos as $dato)

                                                               <tr>
                                                                   <td>{{ $dato->nombres }}</td>
                                                                   <td>{{ $dato->apellidos }}</td>
                                                                   <td><a class="hoverable alert alert-success" href="{{route('admin.edit', $dato->user_rut)}}">editar</a></td>
                                                                   <td><a class="hoverable alert alert-danger" href="{{route('admin.delete', $dato->user_rut)}}">eliminar</a></td>
                                                               </tr>

                                                        @endforeach

                                                    </table>
                                                    {{$datos->links()}}
                                                </div>
                                            </div>



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

