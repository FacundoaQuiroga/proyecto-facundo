<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            //con esto valido si el rol_id de usuario sera 1 o 2 comparando el rut de tabla usuario con el user_rut de la tabla .

            $dato = Residente::where('user_rut', auth()->user()->rut)->first();
            $dato1 = Residente::where('user_rut', auth()->user()->rut)->first();
            if ($dato != null) {

                $valor = ($dato->user_rut);



                if(auth()->user()->rut == $valor){
                    $agregoRole = User::where('rut', '=', auth()->user()->rut)->first();

                    //el 3 es de rol validador, 1 es para rol administrador, 2 para rol residente
                    if($agregoRole -> role_id != '3' && $agregoRole -> role_id != '1'){

                        //si no es validador entonces puede autoasignarle rol residente
                        $agregoRole -> role_id = '2';
                        $agregoRole -> save();
                    }

                }
            }

        /* primer intento pero el de arriba anda perfecto
            $agregoRole = User::where('role_id', '=', "1")->first();
            $agregoRole -> role_id = '2';
            $agregoRole -> save();
        */

        /*muestra vistas dependiendo de el rol que tenga usuario "1 admin","2 residente","3 validador" */

        if (auth()->user()->role_id == '1'){
            return view('homeAdmin', compact('dato'));
        }elseif(auth()->user()->role_id == '2'){
            return view('homeResidente', compact('dato1'));
        }elseif (auth()->user()->role_id == '3'){
            return view('homeValidador');
        }else{
            return view('home');
        }



    }



}
