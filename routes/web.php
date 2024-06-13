<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\carritoController;
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

Route::get('/agroapp', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('recuperar', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('recuperar', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('nueva_contra/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('nueva_contra', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::get('/carrito', [carritoController::class, 'cart']);
Route::get('/carrito/{id}', [carritoController::class, 'anadircart']);
Route::delete('/remove/{id}', [carritoController::class, 'remove']);
Route::resource('/registro', registerController::class);
Route::resource('/usuario', productosController::class);
Route::resource('/administrador', categoriasController::class);
Route::resource('/iniciar-sesion', loginController::class);
Route::post('/agroapp', [loginController::class, 'logout'])->name('logout');
Route::resource('/home', homeController::class);