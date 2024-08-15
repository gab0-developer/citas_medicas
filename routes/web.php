<?php

use App\Http\Controllers\AsignarpermisoUsersController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorUserController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::middleware(['role:administrador'])->group(function () {
        Route::resource('/roles', RolesController::class)->names('roles');
        Route::resource('/permisos', PermisoController::class)->names('permisos');
        Route::resource('/userspermisos', AsignarpermisoUsersController::class)->names('userspermisos');
        Route::resource('/doctores', DoctorController::class)->names('doctor');
    });
    Route::middleware(['role:administrador|paciente'])->group(function () {
        Route::resource('/solicitudcita', SolicitudCitaController::class)->names('solicitudcita');
    });
    Route::middleware(['role:administrador|doctor'])->group(function () {
        Route::get('/doctoruser', [DoctorUserController::class,'index'])->name('doctoruser.index');
        // Route::post('/doctoruser', [DoctorUserController::class,'create'])->name('doctoruser.post');
        // Route::update('/doctoruser', [DoctorUserController::class,'update'])->name('doctoruser.update');
        // Route::delete('/doctoruser', [DoctorUserController::class,'destroy'])->name('doctoruser.delete');
    });
});


