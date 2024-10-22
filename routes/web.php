<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VehiculoDeseadoController;

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
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function (){
    Route::resource('marcas', MarcaController::class);
    Route::resource('series', SerieController::class);
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('deseados', VehiculoDeseadoController::class);
});
