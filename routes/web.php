<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\CasoController;

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

Route::get('/', function () {
    return view('principal');
});

// Vamos a crear una ruta de tipo Resource para el manejo de la CRUD Cliente
// Pero inicialmente hay que asegurarnos que el controlador exista.
Route::resource('crear-cliente', ClienteController::class);
Route::resource('crear-abogado', AbogadoController::class);
Route::resource('crear-caso', CasoController::class);

Route::resource('crear-casos', CasoController::class);




