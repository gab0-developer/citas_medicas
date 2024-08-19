<?php

namespace App\Http\Controllers;

use App\Models\Doctore;
use App\Models\Paciente;
use App\Models\SolicitudCita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $cantidadPacientes= Paciente::all()->count();
        $cantidadDoctores= Doctore::all()->count();
        $cantidadCitasMedicas= SolicitudCita::all()->count();

        return  view('dashboard', compact('cantidadPacientes','cantidadDoctores', 'cantidadCitasMedicas'));

    }
}
