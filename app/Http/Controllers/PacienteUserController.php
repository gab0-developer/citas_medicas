<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisteruserRequest;
use App\Models\Ciudadano;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Paciente;
use App\Models\Parroquia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();

        return view('paciente_login.index', compact('estados', 'municipios', 'parroquias'));
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
    public function store(RegisteruserRequest $request)
    {
        //
        // return $request;
        $ciudadano = Ciudadano::create([
            'nombre_completo' => $request->nombre_paciente,
            'apellido_completo' => $request->apellido_paciente,
            'sexo' => $request->sexo_paciente,
            'fecha_nacimiento' => $request->fecha_nacimiento_paciente,
            'correo' => $request->email_paciente,
            'nro_telefono' => $request->tlf_paciente,
            'nro_tlf_secundario' => $request->tlf_second_paciente,
            'estado_id' => $request->estado_paciente,
            'municipio_id' => $request->municipio_paciente,
            'parroquia_id' => $request->parroquia_paciente
        ]);
        $user = User::create([
            'name' => $request->nombre_paciente,
            'email' => $request->email_paciente,
            'password' => Hash::make($request->password_confirmation)
        ]);
        // asignar rol paciente
        $user->roles()->sync($request->permiso_paciente);
        // registrar ID del ciudadano registrado en paciente 
        $paciente = Paciente::create([
            'ciudadano_id' => $ciudadano->id,
            'user_id' => $user->id
        ]);

        return redirect('/');
        // return redirect()->route('pacientes.index')->with('success', 'Paciente registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
