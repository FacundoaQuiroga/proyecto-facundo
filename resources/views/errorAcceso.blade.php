@extends('layouts.links')

@section('content')
<div class="container mt-md-5 pt-md-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header white">{{ __('Mensaje') }}</div>

                <div class="card-body">


                        <div class="alert alert-danger" role="alert">
                            Error de acceso, usted debe usar unicamente su rut!
                            si esta no es tu sesion entonces vuelve a iniciar sesion

                            <li class="nav-item mt-md-2 pt-md-2 mb-2 ">
                                <a class="alert alert-primary" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
