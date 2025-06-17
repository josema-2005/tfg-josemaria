<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;

// Registro (siempre accesible)
Route::get('/registro', [AuthController::class, 'mostrarFormularioRegistro'])
     ->name('registro');
Route::post('/registro', [AuthController::class, 'register']);

// Login (siempre accesible)
Route::get('/login', [AuthController::class, 'mostrarFormularioLogin'])
     ->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout (solo usuarios autenticados)
Route::post('/cerrarSesion', [AuthController::class, 'logout'])
     ->middleware('auth')
     ->name('cerrarSesion');

// Home de ejemplo
Route::get('/', [HomeController::class, 'index'])
     ->name('home');

// Rutas para el blog
Route::get('/blog', [BlogController::class, 'index'])
     ->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])
     ->name('blog.show');

// Rutas de la Tienda en /tienda
Route::get('/tienda', [ShopController::class, 'index'])
     ->name('tienda.index');
Route::get('/tienda/{id}', [ShopController::class, 'show'])
     ->name('tienda.show');

// Rutas que requieren estar autenticado
Route::middleware('auth')->group(function() {

    // Carrito de compra
    Route::get('/carrito', [CartController::class, 'index'])
         ->name('carrito.index');
    Route::post('/carrito/add', [CartController::class, 'add'])
         ->name('carrito.add');
    Route::post('/carrito/remove', [CartController::class, 'remove'])
         ->name('carrito.remove');
    // Actualizar cantidad en el carrito
    Route::post('/carrito/update', [CartController::class, 'update'])
         ->name('carrito.update');

    // Perfil de usuario
    Route::get('/perfil', [ProfileController::class, 'edit'])
         ->name('perfil.edit');
    Route::post('/perfil', [ProfileController::class, 'update'])
         ->name('perfil.update');

    // Citas
    Route::get('/appointments', [AppointmentController::class, 'index'])
         ->name('appointments.index');
    Route::post('/appointments', [AppointmentController::class, 'store'])
         ->name('appointments.store');
});
