<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Facades\Auth;
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
/**
 * Ruta principal de la pagina y se encarga de llamar al home
 */

Route::get('/', function () {
    return view('home');
});
/**
 * Ruta alternativa para llamar al home
 */
Route::get('/home',[HomeController::class, 'home']);
/**
 * ruta para llamar la ruta de login de administrador
 */
Route::get('/admin',[AdministratorController::class, 'index']);
/**
 * rutas para mostrar las vistas para crear las ovas y crearlas dentro de las BD
 */
Route::get('/crear-ovas',[AdministratorController::class, 'getOva'])->middleware('auth');
Route::post('/crear-ovas',[AdministratorController::class, 'crearOva']);
/**
 * ruta para verificar el auth del administrador
 */
Route::post('/login-adm',[AdministratorController::class, 'login']);
/**
 * rutas para cargar las ovas
 */
Route::get('/ovas/{are_id}',[HomeController::class, 'chargeOvas']);
Route::post('/ovas',[HomeController::class, 'chargeOvas']);
Route::get('/ovas',[HomeController::class, 'chargeOvas']);
/**
 * Rutas para las fichas
 */
Route::get('/ficha-ova/{id}',[HomeController::class, 'fichaOva']);


/**
 * ruta para cerrar sesion del usuario y volver al home
 *
 */
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/home');
}
);
