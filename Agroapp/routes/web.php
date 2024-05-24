<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;

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

Route::get('/senaapp', function () {
    return view('welcome');
});

Route::get('/usuario', function () {
    return view('principal.usuario');
});


Route::resource('/registro', registerController::class);
Route::resource('/iniciar-sesion', loginController::class);
Route::resource('/home', productosController::class);