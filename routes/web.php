<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\AdministradorController;
use App\Models\Residente;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*ruta home bienvenida y donde estan los links para los perfiles*/
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);


/*ruta para listar los residentes en un crud*/
Route::get('/admin', [\App\Http\Controllers\AdministradorController::class, 'index']);

/*ruta para listar los usuarios en un crud*/
Route::get('/adminUsers', [\App\Http\Controllers\AdministradorController::class, 'indexUsers']);

/*ruta para listar Solicitudes de Residentes*/
Route::get('/adminSubsidio', [\App\Http\Controllers\AdministradorController::class, 'indexSubsidio']);

/*ruta para editar perfiles de residentes*/
Route::get('/admin/{valor}/editar',[AdministradorController::class, 'edit'])->name('admin.edit');

/*ruta para editar perfiles de usuarios*/
Route::get('/adminUsers/{valor}/editar',[AdministradorController::class, 'editUsers'])->name('adminUsers.edit');

/*sube los cambios a la tabla residentes*/
Route::put('/admin/{valor}',[AdministradorController::class, 'update'])->name('admin.update');

/*sube los cambios a la tabla users*/
Route::put('/adminUsers/{valor}',[AdministradorController::class, 'updateUsers'])->name('adminUsers.update');

/*confirma eliminar dato*/
Route::get('/admin/{valor}/confirmDelete',[AdministradorController::class, 'confirmDelete'])->name('admin.delete');
/*elimina dato*/
Route::put('/admin/{valor}/destroy',[AdministradorController::class, 'destroy'])->name('admin.destroy');

/*confirma eliminar dato de user*/
Route::get('/adminUsers/{valor}/confirmDeleteUsers',[AdministradorController::class, 'confirmDeleteUsers'])->name('adminUsers.delete');
/*elimina datos user*/
Route::put('/adminUsers/{valor}/destroyUsers',[AdministradorController::class, 'destroyUsers'])->name('adminUsers.destroyUsers');

/*vista Restaurar residente eliminado */
Route::get('/admin/restaurar',[AdministradorController::class, 'restaurar'])->name('admin.restaurar');
Route::get('/admin/restaurar/{valor}',[AdministradorController::class, 'recuperarResidente'])->name('admin.recuperarResidente');
Route::get('/admin/restaurar/{valor}/eliminar-definitivamente',[AdministradorController::class, 'EliminarResidente'])->name('admin.EliminarResidente');

//vista importar residentes por excel
Route::get('/admin/importar',[AdministradorController::class, 'importarVista'])->name('admin.importar');
Route::get('/admin/actualizar',[AdministradorController::class, 'actualizarVista'])->name('admin.actualizar');
//importacion del archivo excel
Route::Post('/admin/importar',[AdministradorController::class, 'importarExcel'])->name('admin.importar.excel');
//la ruta actualizar no sirve para agregar nuevos registros solo para actualizar los campos de los que ya se encuentran
//Route::Post('/admin/actualizar',[AdministradorController::class, 'actualizarExcel'])->name('admin.actualizar.excel');

//EXPORTACION DEL ARCHIVO EXCEL RESIDENTE
Route::get('/admin/exportar',[AdministradorController::class, 'exportarExcel'])->name('admin.exportar.excel');

/*vista Restaurar users eliminado*/
Route::get('/adminUsers/restaurar',[AdministradorController::class, 'restaurarUsers'])->name('adminUsers.restaurar');
Route::get('/adminUsers/restaurar/{valor}',[AdministradorController::class, 'recuperarUsers'])->name('adminUsers.recuperarUsuario');
Route::get('/adminUsers/restaurar/{valor}/eliminar-definitivamente',[AdministradorController::class, 'EliminarUsers'])->name('adminUsers.eliminarUsuario');

/* esta ruta servia para devolverme todas los metodos de la clase "index,show,create,update,delete"
 * Route::resource('residentes', ResidenteController::class)->names('residentes');  */


/*estas son las rutas de el controlador Residente necesito implementar el resource para usar solo una linea*/
Route::get('residentes/{user_rut}',[ResidenteController::class, 'show'])->name('residentes.show');
Route::get('residentes',[ResidenteController::class, 'index'])->name('residentes.index');
Route::get('residentes/{user_rut}/solicitud',[ResidenteController::class, 'solicitud'])->name('residentes.solicitud');

//Subsidio vista
Route::get('/residentes/{user_rut}/subsidio',[ResidenteController::class, 'subsidio'])->name('residentes.subsidio');
//solicitud de subsidio create
Route::get('/residentes/{user_rut}/subsidio/create', [ResidenteController::class, 'createSubsidio'])->name('subsidios.create');
Route::post('/residentes/{user_rut}/subsidio', [ResidenteController::class, 'storeSubsidio'])->name('subsidios.store')->middleware('auth', 'throttle:3,1440');

/* IMPORTACION EXCEL SUBSIDIO*/
//vista
Route::get('/admin/importarSubsidio',[AdministradorController::class, 'importarVistaSubsidio'])->name('admin.importarSubsidio');
//actualizar excel subsidio
Route::get('/admin/actualizarSubsidio',[AdministradorController::class, 'actualizarVistaSubsidio'])->name('admin.actualizarSubsidio');
//la ruta actualizar no sirve para agregar nuevos registros solo para actualizar los campos de los que ya se encuentran
Route::Post('/admin/actualizarSubsidio',[AdministradorController::class, 'actualizarExcelSubsidio'])->name('admin.actualizarSubsidio.excel');

//importacion subsidio
Route::Post('/admin/importarSubsidio',[AdministradorController::class, 'importarSubsidio'])->name('admin.importarSubsidio.excel');

/*  EXPORTACION EXCEL SUBSIDIO */
Route::get('/admin/exportarSubsidio',[AdministradorController::class, 'exportarSubsidio'])->name('admin.exportarSubsidio');


/* estas son rutas para que el residente no entre al perfil de admin y para que admin no entre a perfil residente*/
Route::get('/principal', [\App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/principal1', [\App\Http\Controllers\UsuarioController::class, 'subindex']);
Route::get('/sesionCaducada', [\App\Http\Controllers\UsuarioController::class, 'sesioncaducada']);

/*ruta de codigo qr para residente*/

Route::get('qrcode/{id}',[\App\Http\Controllers\CodigoController::class, 'qrcodeShow'])->name('qrcode.show');
Route::get('qrcode',[\App\Http\Controllers\CodigoController::class, 'qrcodeIndex'])->name('qrcode.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
