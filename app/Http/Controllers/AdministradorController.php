<?php

namespace App\Http\Controllers;
use App\Http\Middleware\EsAdmin;
use App\Models\Residente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdministradorController extends Controller
{
    use SoftDeletes;

    public function __construct() {
        $this->middleware('EsAdmin');
    }

    //En esta clase se encuentra el crud de Residente y usuarios de la sesion administrador
    //primero se encuentra el crud de residente con sus funciones de editar eliminar y recuperar
    //despues se encuentra el crud de usuario con las mismas funciones.

    /////////////////////////////////////////////////////
    // Residentes acceso solo para Administrador
    /////////////////////////////////////////////////////

    /*listar residentes ordenados*/
    public function index(Request $request) {


        //buscador en el crud para buscar los residentes o para el crud de usuarios
        if ($request) {

            $query = trim($request->get('search'));

            $datos = Residente::where('nombres', 'LIKE', '%' . $query . '%')
                                ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                                ->orderBy('id','asc')
                                ->paginate();
            return view('admin.admin', ['datos' => $datos, 'search' => $query]);
        }
        /*
        return view('admin.admin', [
            'datos' => Residente::paginate()
        ]);
        */
    }

    //editar residente
    //editar residente
    public function edit($valor)
    {
        $residente = Residente::findOrFail($valor);

        return view('admin.edit', compact('residente'));
    }

    //subir nuevos datos a base de datos de residente
    public function update(Request $request, $valor){
        $residente = Residente::findOrFail($valor);

        $residente->user_rut = $request->get('user_rut');
        $residente->nombres = $request->get('nombres');
        $residente->apellidos = $request->get('apellidos');
        $residente->comuna = $request->get('comuna');
        $residente->sector = $request->get('sector');
        $residente->fecha_actualizacion = $request->get('fecha_actualizacion');
        $residente->fecha_certificado = $request->get('fecha_certificado');
        $residente->save();

        return  redirect('/admin/');
    }

    //eliminar residente
    public function destroy($valor){
        $residente = Residente::findOrFail($valor);
        $residente->delete();
        return redirect('/admin');
    }

    //confirmacion de eliminacion
    public function confirmDelete($valor){
        $residente = Residente::findOrFail($valor);
        return view('admin.confirmDelete',compact('residente'));
    }

    /*vista restaurar residente*/
    public function restaurar(){
        $datos = Residente::onlyTrashed()->paginate();

        return view('admin.restaurar',compact('datos'));
    }

    /*recupera datos eliminados de residente*/
    public function recuperarResidente($valor){
        Residente::withTrashed()->find($valor)->restore();

        return redirect('/admin/restaurar');
    }

    /*elimina datos forceDelete de residente*/
    public function EliminarResidente($valor){
        Residente::withTrashed()->find($valor)->forceDelete();

        return redirect('/admin/restaurar');
    }



    /////////////////////////////////////////////////////
    // Usuarios acceso solo para Administrador
    /////////////////////////////////////////////////////

    /*clase de listado usuarios*/
    public function indexUsers(Request $request) {
        if ($request) {
            $query = trim($request->get('search'));

            $datos = User::where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('rut', 'LIKE', '%' . $query . '%')
                ->orderBy('id','asc')
                ->paginate();
            return view('admin.adminUsers', ['datos' => $datos, 'search' => $query]);
        }
        /*
        return view('admin.admin', [
            'datos' => Residente::paginate()
        ]);
        */
    }

    //editar usuarios
    public function editUsers($valor)
    {
        $user = User::findOrFail($valor);

        return view('admin.editUsers', compact('user'));
    }

    //subir nuevos datos a base de datos residentes
    public function updateUsers(Request $request, $valor){

        $user = User::findOrFail($valor);

        $user->rut = $request->get('rut');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->rol_id = $request->get('rol_id');
        $user->save();

        return  redirect('/adminUsers/');
    }

    //eliminar usuario
    public function destroyUsers($valor){
        $user = User::findOrFail($valor);
        $user->delete();
        return redirect('/adminUsers');
    }

    //confirmacion de eliminacion
    public function confirmDeleteUsers($valor){
        $user = User::findOrFail($valor);
        return view('admin.confirmDeleteUsers',compact('user'));
    }

    /*vista restaurar usuarios*/
    public function restaurarUsers(){
        $datos = User::onlyTrashed()->paginate();

        return view('admin.restaurarUsers',compact('datos'));
    }

    /*recupera datos eliminados usuarios*/
    public function recuperarUsers($valor){
        User::withTrashed()->find($valor)->restore();

        return redirect('/adminUsers/restaurar');
    }

    /*elimina datos forceDelete usuarios*/
    public function EliminarUsers($valor){
        User::withTrashed()->find($valor)->forceDelete();

        return redirect('/adminUsers/restaurar');
    }


}
