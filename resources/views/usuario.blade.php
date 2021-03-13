@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu Principal') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{ Auth::user()->name }}

                      <ul><a>Actualmente no estas registrado como residente solicita en la municipalidad dicha solicitud!</a></ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
