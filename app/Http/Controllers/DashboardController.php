<?php

namespace App\Http\Controllers;

use App\Models\Doctore;
use App\Models\Paciente;
use App\Models\SolicitudCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $cantidadPacientes= Paciente::all()->count();
        $cantidadDoctores= Doctore::all()->count();
        $cantidadCitasMedicas= SolicitudCita::all()->count();
        // graficas
        $solicitudesYear = DB::table('solicitud_citas')
            ->select(DB::raw('TO_CHAR(fecha_registro, \'YYYY\') as year'), DB::raw('COUNT(*) as cantidad'))
            ->groupBy(DB::raw('TO_CHAR(fecha_registro, \'YYYY\')'))
            ->orderBy(DB::raw('TO_CHAR(fecha_registro, \'YYYY\')'))
            ->get()
        ;
        $solicitudesMonth = DB::table('solicitud_citas')
            ->select(DB::raw('TO_CHAR(fecha_registro, \'MM\') as mes'), DB::raw('COUNT(*) as cantidad'))
            ->groupBy(DB::raw('TO_CHAR(fecha_registro, \'MM\')'))
            ->orderBy(DB::raw('TO_CHAR(fecha_registro, \'MM\')'))
            ->get()
        ;
        // return $solicitudesMonth;
        // return 

        //     [
        //         'cantidadPacientes' => $cantidadPacientes,
        //         'cantidadDoctores' => $cantidadDoctores, 
        //         'cantidadCitasMedicas' => $cantidadCitasMedicas,
        //         'solicitudesMonth' =>$solicitudesMonth,
        //         'solicitudesYear' =>$solicitudesYear
        //     ]
        // ;
        return  view('dashboard', [
            'cantidadPacientes' => $cantidadPacientes,
            'cantidadDoctores' => $cantidadDoctores, 
            'cantidadCitasMedicas' => $cantidadCitasMedicas,
            'solicitudesYear' =>$solicitudesYear,
            'solicitudesMonth' =>$solicitudesMonth
            ]
        );

    }
}
