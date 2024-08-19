<?php

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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// FORMULARIO DE REGISTRO DE PACIENTE
Route::resource('/userpaciente', PacienteUserController::class)->names('paciente');

// RUTA PARA OBTENER LISTADO DE MUNIPIO Y PARROQUIA
Route::get('/municipio/{estadoId}', [MunicpioController::class,'getMunicipio']);
Route::get('/parroquia/{municipioId}', [ParroquiaController::class,'getParroquia']);


// VALIDAR AUTENTICACION DEL USUARIO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::middleware(['role:administrador'])->group(function () {
        Route::resource('/roles', RolesController::class)->names('roles');
        Route::resource('/permisos', PermisoController::class)->names('permisos');
        Route::resource('/userspermisos', AsignarpermisoUsersController::class)->names('userspermisos');
        Route::resource('/doctores', DoctorAdminController::class)->names('doctor');

        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    });
    Route::middleware(['role:administrador|paciente'])->group(function () {
        Route::resource('/solicitudcita', SolicitudCitaController::class)->names('solicitudcita');
    });
    
    Route::middleware(['role:administrador|doctor'])->group(function () {

        Route::get('/doctorcitapendiente', [DoctorCitaPendienteController::class,'index'])->name('doctorcitapendiente.index');
        // Route::post('/doctorcitapendiente', [DoctorCitaPendienteController::class,'create'])->name('doctorcitapendiente.post');
        Route::get('/doctorcitapendiente/{id}', [DoctorCitaPendienteController::class,'edit'])->name('doctorcitapendiente.edit');
        Route::put('/doctorcitapendiente/{id}', [DoctorCitaPendienteController::class,'update'])->name('doctorcitapendiente.update');
        // Route::delete('/doctorcitapendiente', [DoctorCitaPendienteController::class,'destroy'])->name('doctorcitapendiente.delete');


        Route::get('/doctorcitaatendidos', [DoctorCitaAtendidosController::class,'index'])->name('doctorcitaatendido.index');
        // Route::post('/doctorcitaatendidos', [DoctorCitaAtendidosController::class,'create'])->name('doctorcitaatendido.post');
        Route::get('/doctorcitaatendidos/{id}', [DoctorCitaAtendidosController::class,'edit'])->name('doctorcitaatendido.edit');
        Route::put('/doctorcitaatendidos/{id}', [DoctorCitaAtendidosController::class,'update'])->name('doctorcitaatendido.update');
        // Route::delete('/doctorcitaatendidos', [DoctorCitaAtendidosController::class,'destroy'])->name('doctorcitaatendido.delete');
    });
});


