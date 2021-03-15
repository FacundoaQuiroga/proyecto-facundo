@extends('layouts.links')

@section('content')
<div class="container mt-md-5 pt-md-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header white">{{ __('Mensaje') }}</div>

                <div class="card-body">


                        <div class="alert alert-danger" role="alert">
                            Sesion Caducada Porfavor vuelva a iniciar sesion!

                            <li class="nav-item mt-md-2 pt-md-2 mb-2 ">
                                <a class="alert alert-primary" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </li>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
