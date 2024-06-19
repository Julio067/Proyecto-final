<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\carritoController;
use App\Http\Controllers\freeController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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
    return view('welcome');
});

Route::resource('/agroapp', freeController::class);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::middleware('guest')->group(function () {
    Route::get('recuperar', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('recuperar', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('nueva_contra/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('nueva_contra', [NewPasswordController::class, 'store'])->name('password.update');
});


Route::get('/carrito', [CarritoController::class, 'carrito'])->name('carrito');
Route::get('/carrito/{id}', [CarritoController::class, 'anadircarrito'])->name('carrito.anadir');
Route::delete('/remove/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::post('/carrito/incrementar/{id}', [CarritoController::class, 'incrementar'])->name('carrito.incrementar');
Route::post('/carrito/disminuir/{id}', [CarritoController::class, 'disminuir'])->name('carrito.disminuir');
Route::post('/carrito/limpiar', [CarritoController::class, 'limpiarcarrito'])->name('carrito.limpiar');

Route::resource('/registro', registerController::class);
Route::resource('/usuario', productosController::class);
Route::resource('/administrador', categoriasController::class);
Route::resource('/iniciar-sesion', loginController::class);
Route::resource('/home', homeController::class);