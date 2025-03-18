<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Ciudadano;
use App\Models\Doctore;
use App\Models\Especialidade;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\User;
use App\Models\Viewpostgres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //DATA PARA EL MODAL
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        $especialidades = Especialidade::all();
        // DATATABLE
        $doctores = Doctore::all();
        // LLAMADO DE VIEW SQL
        $viewPostgres =  new Viewpostgres();
        $data_doctores_view = $viewPostgres->doctores_view();
        return view('doctor.index', compact('estados', 'municipios', 'especialidades','data_doctores_view'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        //
        // dd($request);
        // return $request;
        $ciudadano = Ciudadano::create([
            'nombre_completo' => $request->nombre_doctor,
            'apellido_completo' => $request->apellido_doctor,
            'sexo' => $request->sexo_doctor,
            'fecha_nacimiento' => $request->fecha_nacimiento_doctor,
            'correo' => $request->email_doctor,
            'nro_telefono' => $request->tlf_doctor,
            'nro_tlf_secundario' => $request->tlf_second_doctor,
            'estado_id' => $request->estado_doctor,
            'municipio_id' => $request->municipio_doctor,
            'parroquia_id' => $request->parroquia_doctor,
            'cedula' => $request->cedula_doctor
        ]);
        $user = User::create([
            'name' => $request->nombre_doctor,
            'email' => $request->email_doctor,
            'password' => Hash::make($request->password_confirmation)
        ]);
        // asignar rol doctor
        $user->roles()->sync($request->rol_doctor);
        // registrar ID del ciudadano registrado en doctor 
        $doctor = Doctore::create([
            'mpps' => $request->mpps_doctor,
            'ciudadano_id' => $ciudadano->id,
            'especialidad_id' => $request->especialidad_doctor,
            'user_id' => $user->id
        ]);

        return back()->with('success', "Doctor: $request->nombre_doctor $request->apellido_doctor registrado exitosamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // LLAMADO DE VIEW SQL
        $viewPostgres =  new Viewpostgres();
        $data_doctores_view = $viewPostgres->doctores_view($id);
        return [ 'data_doctor' =>$data_doctores_view];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // LLAMADO DE VIEW SQL
        $viewPostgres =  new Viewpostgres();
        $data_doctores_view = $viewPostgres->doctores_view($id);
        return [ 'data_doctor' =>$data_doctores_view];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ciudadanofind = Ciudadano::find($id);
        $userfind = User::find($request->user_id);
        $ciudadanofind->update([
            'nombre_completo' => $request->nombre_doctor,
            'apellido_completo' => $request->apellido_doctor,
            'correo' => $request->email_doctor,
            'nro_telefono' => $request->tlf_doctor,
            'nro_tlf_secundario' => $request->tlf_second_doctor,
        ]);
        $userfind->update([
            'name' => $request->nombre_doctor,
            'email' => $request->email_doctor
        ]);
        return back()->with('success', "Modificaciones registradas exitosamente");
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$doctor[0]->user_id
        $doctor = Doctore::where('ciudadano_id', $id)->get();
        $ciudadano = Ciudadano::find($id);
        $userDoctro = user::find($id);

        $nameDoctor = $ciudadano->nombre_completo;
        $apellidoDoctor = $ciudadano->apellido_completo	;

        $doctorDelete= $doctor[0];
        $doctorDelete->delete();

        $ciudadano->delete();
        $userDoctro->delete();
        
        // return $doctorDelete;
        return back()->with('success', "DOCTOR: $nameDoctor $apellidoDoctor Eliminado permanente");
    }
}
