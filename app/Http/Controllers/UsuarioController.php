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

            return view('vistasError.sesionCaducada');


    }

}
