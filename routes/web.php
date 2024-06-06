<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoriasController;
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

Route::get('/agroapp', function () {
    return view('welcome');
});



Route::resource('/registro', registerController::class);
Route::resource('/iniciar-sesion', loginController::class);
Route::resource('/usuario', productosController::class);
Route::resource('/home', homeController::class);
Route::resource('/administrador', categoriasController::class);
Route::post('/agroapp', [loginController::class, 'logout'])->name('logout');