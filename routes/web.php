<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AsignarpermisoUsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorAdminController;
use App\Http\Controllers\DoctorCitaAtendidosController;
use App\Http\Controllers\DoctorCitaPendienteController;
use App\Http\Controllers\MunicpioController;
use App\Http\Controllers\PacienteUserController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SolicitudCitaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('homepage');

// FORMULARIO DE REGISTRO DE PACIENTE
Route::resource('/userpaciente', PacienteUserController::class)->names('paciente');

// RUTAS PARA OBTENER MUNICIPIOS Y PARROQUIAS
Route::get('/municipio/{estadoId}', [MunicpioController::class, 'getMunicipio']);
Route::get('/parroquia/{municipioId}', [ParroquiaController::class, 'getParroquia']);

// VALIDAR AUTENTICACIÓN DEL USUARIO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role.redirect:paciente,doctor,administrador' //redireccionamiento de rutas segun el rol del usuario autenticado
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Rutas para administrador
    Route::middleware(['role:administrador'])->group(function () {
        Route::resource('/roles', RolesController::class)->names('roles');
        Route::resource('/permisos', PermisoController::class)->names('permisos');
        Route::resource('/userspermisos', AsignarpermisoUsersController::class)->names('userspermisos');
        Route::resource('/doctores', DoctorAdminController::class)->names('doctor');
        
        Route::resource('/administrador', AdministradorController::class)->names('administrador');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    });

    // Rutas para paciente y administrador
    Route::middleware(['role:administrador|paciente'])->group(function () {
        Route::resource('/solicitudcita', SolicitudCitaController::class)->names('solicitudcita');
    });

    // Rutas para doctor
    // Route::middleware(['role:doctor'])->group(function () {
        Route::get('/doctorcitapendiente', [DoctorCitaPendienteController::class, 'index'])->name('doctorcitapendiente.index');
        Route::get('/doctorcitapendiente/{id}', [DoctorCitaPendienteController::class, 'edit'])->name('doctorcitapendiente.edit');
        Route::put('/doctorcitapendiente/{id}', [DoctorCitaPendienteController::class, 'update'])->name('doctorcitapendiente.update');

        Route::get('/doctorcitaatendidos', [DoctorCitaAtendidosController::class, 'index'])->name('doctorcitaatendido.index');
        Route::get('/doctorcitaatendidos/{id}', [DoctorCitaAtendidosController::class, 'edit'])->name('doctorcitaatendido.edit');
        Route::put('/doctorcitaatendidos/{id}', [DoctorCitaAtendidosController::class, 'update'])->name('doctorcitaatendido.update');
    // });
});
