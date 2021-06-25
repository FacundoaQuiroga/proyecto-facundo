<?php

namespace App\Http\Controllers;
use App\Http\Middleware\EsAdmin;
use App\Models\Residente;
use App\Models\Subsidio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ResidentesImport;
use App\Exports\ResidentesExport;
use App\Exports\SubsidiosExport;
use App\Imports\SubsidiosImport;




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
            return view('admin.admin', ['datos' => $datos, 'search' => $query, ]);
        }


        /*
        return view('admin.admin', [
            'datos' => Residente::paginate()
        ]);
        */
    }


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


    /*historial de subsidios de residente*/
    public function HistorialResidente($valor){

        $subsidio = Subsidio::where('user_rut', $valor)
            ->orderBy('fecha_viaje','desc')
            ->paginate();

        return view('admin.historialSubsidio', compact('subsidio'));
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

    /////////////////////////////////////////////////////
    // importar residentes acceso solo para Administrador
    /////////////////////////////////////////////////////

    // EXCEL PARA RESIDENTE

    /*vista importar residentes por excel*/
    public function importarVista(){

        return view('admin.importar');
    }

    //VISTA DE ACTUALIZAR RESIDENTES
//    public function actualizarVista(){
//
//        return view('admin.actualizar');
//    }

    /*importacion de excel residentes*/
    public function importarExcel(Request $request){

        $file = $request->file('file');
        Excel::import(new ResidentesImport, $file);

        return back()->with('message', 'Importacion de residentes completada');
    }

    /*EXPORTACION DE RESIDENTES POR EXCEL*/
    public function exportarExcel(Request $request){

        return Excel::download(new ResidentesExport, 'residentes.xlsx');
    }
// no es necesario actualizar Residentes porque con el importar basta para importar y actualizar gracias a el uniquekey en user_rut
//    public function actualizarExcel(Request $request){
//
//        $file = $request->file('file');
//        $residentes = Excel::toCollection(new ResidentesImport, $file);
//        foreach($residentes[0] as $residente){
//            //dd($residente['nombres']);
//
//            Residente::where('user_rut', $residente['rut'])->update([
//                'nombres' => $residente['nombres'],
//                'apellidos' => $residente['apellidos'],
//                'user_rut' => $residente['rut'],
//                'comuna' => $residente['comuna'],
//                'fecha_certificado' => $residente['fechacert'],
//                'fecha_actualizacion' => $residente['fechaactualizacion'],
//                'sector' => $residente['sector'],
//            ]);
//        }
//
//        return back()->with('message', 'Actualizacion de residentes completada');
//    }

    /////////////////////////////////////////////////////
    // Solicitudes de subsidio acceso solo para Administrador
    /////////////////////////////////////////////////////

    //LISTADO SOLICITUDES DE SUBSIDIO
    public function indexSubsidio(Request $request) {
        //buscador en el crud para buscar subsidios de residentes
        if ($request) {
            $query = trim($request->get('search'));
            $datos = Subsidio::where('nombres', 'LIKE', '%' . $query . '%')
                ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                ->orderBy('fecha_viaje','desc')
                ->paginate();
            //dump($datos);
            return view('admin.adminSubsidio', ['datos' => $datos, 'search' => $query]);
        }

    }

    /*VISTA IMPORTAR SUBSIDIOS POR EXCEL*/
    public function importarVistaSubsidio(){

        return view('admin.importarSubsidio');
    }
    //VISTA ACTUALIZAR SUBSIDIOS
    public function actualizarVistaSubsidio(){

        return view('admin.actualizarSubsidio');
    }

    /*ACTUALIZAR SUBSIDIOS*/
    public function actualizarExcelSubsidio(Request $request){



        $file = $request->file('file');

        $subsidios = Excel::toCollection(new SubsidiosImport, $file);

        //array de los 12 meses de la plantilla excel
        $meses = array(0,1,2,3,4,5,6,7,8,9,10,11);

        //recorre los 12 meses con la variable $i
        foreach($meses as $i){

            // va haciendo las actualizaciones dependiendo de la posicion de $subsidios[$i] desde el mes enero a diciembre
            foreach ($subsidios[$i] as $subsidio){
                //dd($subsidio['nombres']);
                Subsidio::where('id', $subsidio['id'])->update([
                    'nombres' => $subsidio['nombres'],
                    'apellidos' => $subsidio['apellidos'],
                    'user_rut' => $subsidio['rut'],
                    'email' => $subsidio['email'],
                    'tipo_subsidio' => $subsidio['tipo_de_subsidio'],
                    'tramo' => $subsidio['tramo'],
                    'fecha_viaje' => $subsidio['fecha_de_viaje'],
                    'estado' => $subsidio['estado'],
                ]);


            }
        }


        return back()->with('message', 'Actualizacion de subsidios completada');
    }


    /*IMPORTACION DE SUBSIDIOS POR EXCEL*/
    public function importarSubsidio(Request $request){
        $file = $request->file('file');
        Excel::import(new SubsidiosImport, $file);

        return back()->with('message', 'Importacion de residentes completada');
    }

    public function exportarVistaSubsidio(){


        return view('admin.exportarSubsidio');
    }

    /*EXPORTACION DE SUBSIDIOS POR EXCEL*/
    public function exportarSubsidio(Request $request){

        $año = $request->get('fecha');

        return (new SubsidiosExport)->forYear($año)->download('subsidios.xlsx');
        //return Excel::download(new SubsidiosExport, 'subsidios.xlsx');
    }



}
