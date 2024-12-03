<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CanchaController;



Route::get('/', HomeController::class);

Route::controller(CursoController::class)->group(function(){
    Route::get('cursos',  'index'  );
    Route::get('cursos/create',  'create' );
    Route::get('cursos/{curso}',  'show' );
});
Route::get('/create', [CursoController::class, 'create'])->name('create');
Route::get('/index', [CursoController::class, 'index'])->name('index');
Route::post('/create', [UserController::class, 'create'])->name('create.store');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('create');



// Rutas para el registro
Route::controller(RegisterController::class)->group(function() {
  Route::get('/register', 'show')->name('register.index');
  Route::post('/register', 'store')->name('register.store');
});

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/create', [LoginController::class, 'showLoginForm'])->name('login.create');

// Ruta para procesar el inicio de sesión
Route::post('/create', [LoginController::class, 'login'])->name('login.store');

// Ruta para la página protegida (show) después de iniciar sesión
// Ruta para la página 'show' (cursos.show) después de iniciar sesión
Route::get('/cursos/show', [CursoController::class, 'show'])->middleware('auth')->name('cursos.show');

Route::middleware('auth')->group(function () {
  Route::post('/reservar', [ReservaController::class, 'reservar']);
  Route::post('/cancelar', [ReservaController::class, 'cancelar']);
});

// serrar seccion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//reservas
Route::post('/reservas', [ReservaController::class, 'reservar'])->name('reservas.store');
Route::post('/reservas/cancelar', [ReservaController::class, 'cancelar'])->name('reservas.cancelar');

//ruta para canchas
Route::post('/canchas', [CanchaController::class, 'store'])->name('canchas.store');

Route::post('/reservar', [ReservaController::class, 'reservar'])->name('reservar');
Route::post('/verificar-disponibilidad', [ReservaController::class, 'verificarDisponibilidad'])->name('verificarDisponibilidad');
Route::post('/cancelar-reserva', [ReservaController::class, 'cancelarReserva'])->name('cancelarReserva');