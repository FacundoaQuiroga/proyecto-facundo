<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function index()
    {
        return view('vistasError.usuario');
    }
    public function subindex()
    {
        return view('vistasError.usuario2');
    }
    public function sesioncaducada()
    {
        if (auth()->user()->role_id != '1'){
            return view('vistasError.sesionCaducada');
        }

    }

}
