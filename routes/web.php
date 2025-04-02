<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RolUsuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\NotificacionController;

Route::get('/', HomeController::class)->name('home');


//esto de rolusuario recuerda que es un middleware lo que hace aqui es que si el usuario con rol 1 esta yendo a el dashboard lo manda a la home se reutiliza el middleware
Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified', RolUsuario::class])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

//notificaciones
//recuerda que nada mas tienen un metodo el invoke por es la forma
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified', RolUsuario::class])->name('notificaciones');

//ver candidatos
Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->middleware(['auth', 'verified', RolUsuario::class])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
