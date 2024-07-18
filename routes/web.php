<?php

use App\Http\Controllers\facturaController;
use App\Http\Controllers\ventaController;
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


Route::get('', [freeController::class, 'index'])->name('agroapp');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::middleware('guest')->group(function () {
    Route::get('recuperar', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('recuperar', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('nueva_contra/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('nueva_contra', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::get('/carrito', [carritoController::class, 'carrito'])->name('carrito');
Route::get('/carrito/{id}', [carritoController::class, 'anadircarrito'])->name('carrito.anadir');
Route::delete('/remove/{id}', [carritoController::class, 'remove'])->name('carrito.remove');
Route::post('/carrito/incrementar/{id}', [carritoController::class, 'incrementar'])->name('carrito.incrementar');
Route::post('/carrito/disminuir/{id}', [carritoController::class, 'disminuir'])->name('carrito.disminuir');
Route::post('/carrito/actualizar/{id}', [carritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::delete('/carrito/limpiar', [carritoController::class, 'limpiarcarrito'])->name('carrito.limpiar');
Route::post('/carrito/comprar/{producto}', [carritoController::class, 'comprar'])->name('carrito.comprar');
Route::get('/pasarela/{producto_id}', [carritoController::class, 'pasarela'])->name('pasarela');
Route::get('/factura/{id}', [facturaController::class, 'index'])->name('factura.mostrar');

Route::get('/usuario/misVentas', [ventaController::class, 'misVentas'])->name('usuario.misVentas')->middleware('auth');
Route::resource('/registro', registerController::class);
Route::resource('/usuario', productosController::class);
Route::resource('/administrador', categoriasController::class);
Route::resource('/iniciar-sesion', loginController::class);
Route::resource('/home', homeController::class);