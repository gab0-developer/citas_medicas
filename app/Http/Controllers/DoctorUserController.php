<?php

namespace App\Http\Controllers;

use App\Models\Doctore;
use App\Models\EspecialidadesTipocita;
use App\Models\SolicitudCita;
use App\Models\Viewpostgres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorUserController extends Controller
{
    //
    public function index(){
        
        $userAuth = Auth::user();
        $doctor = Doctore::where('user_id',$userAuth->id)->get();
        $especialidades_tipocitas = EspecialidadesTipocita::where('especialidad_id',$doctor[0]->especialidad_id)->get();

        /// Convertimos el array a una colección
        $collection = collect($especialidades_tipocitas);

        // Usamos pluck para obtener los id de especialidades_tipocitas también devolverá un array con los valores del id
        $especialidad_ids = $collection->pluck('id')->toArray();

        // view posgtres 
        $viewPostgres = new Viewpostgres();
        $citasmedicas_view = $viewPostgres->citasmedicas_view($especialidad_ids,$userAuth['roles'][0]->name);
        // return $citasmedicas_view;


        return view('doctoruser.index',compact('citasmedicas_view'));
    }
    public function edit(string $id)
    {
        //
        // LLAMADO DE VIEW SQL
        $solicitudCitaMedica = SolicitudCita::find($id);
        $dataview =DB::table('citas_medicas_view')->where('id',$id)->get();
        return [ 'data_cita' => $dataview];
        
        // $viewPostgres =  new Viewpostgres();
        // $data_doctores_view = $viewPostgres->doctores_view($id);
        // return [ 'data_doctor' =>$data_doctores_view];
    }
    public function update(Request $request, string $id)
    {
        //
    }
}
