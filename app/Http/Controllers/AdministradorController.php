<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministradorRequest;
use App\Models\Ciudadano;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\Viewpostgres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
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

        // $usersAdmin = User::role('administrador')->get();
        // // return $usersAdmin;
        // // Crear una lista de IDs de ciudadanos relacionados con los administradores
        // $userAdminIds = $usersAdmin->pluck('id');
        // // return $userAdminIds;
        // // Obtener los ciudadanos que coinciden con los IDs de la lista 
        // $Administradores = Ciudadano::whereIn('id', $userAdminIds)->get();
        // // return $Administradores;

        // view posgtres 
        $viewPostgres =  new Viewpostgres();
        $administradores = $viewPostgres->useradministrador_view();
        return view('users.admin.index',compact('estados','municipios','parroquias','administradores'));
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
    public function store(AdministradorRequest $request)
    {
        //
        // return $request;
        $ciudadano = Ciudadano::create([
            'nombre_completo' => $request->nombre_useradmin,
            'apellido_completo' => $request->apellido_useradmin,
            'sexo' => $request->sexo_useradmin,
            'fecha_nacimiento' => $request->fecha_nacimiento_useradmin,
            'correo' => $request->email_useradmin,
            'nro_telefono' => $request->tlf_useradmin,
            'nro_tlf_secundario' => $request->tlf_second_useradmin,
            'estado_id' => $request->estado_useradmin,
            'municipio_id' => $request->municipio_useradmin,
            'parroquia_id' => $request->parroquia_useradmin,
            'cedula' => $request->cedula_useradmin
        ]);
        $user = User::create([
            'name' => $request->nombre_useradmin,
            'email' => $request->email_useradmin,
            'password' => Hash::make($request->password_confirmation)
        ]);
        // asignar rol useradmin
        $user->roles()->sync($request->rol_useradmin);
        // registrar ID del ciudadano registrado en useradmin 
        $userAdmin = UserAdmin::create([
            'ciudadano_id' => $ciudadano->id,
            'user_id' => $user->id
        ]);

        return back()->with('success', "Administrador: $request->nombre_useradmin $request->apellido_useradmin registrado exitosamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $viewPostgres =  new Viewpostgres();
        $administradores = $viewPostgres->useradministrador_view($id);
        return [ 'data_useradmin' =>$administradores];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $viewPostgres =  new Viewpostgres();
        $administradores = $viewPostgres->useradministrador_view($id);
        return [ 'data_useradmin' =>$administradores];
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
            'nombre_completo' => $request->nombre_useradmin,
            'apellido_completo' => $request->apellido_useradmin,
            'nro_telefono' => $request->tlf_useradmin,
            'nro_tlf_secundario' => $request->tlf_second_useradmin,
        ]);
        $userfind->update([
            'name' => $request->nombre_useradmin,
        ]);
        return back()->with('success', "Modificaciones registradas exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //$doctor[0]->user_id
        $userAdmin = UserAdmin::where('ciudadano_id', $id)->get();
        $ciudadano = Ciudadano::find($id);
        $user = user::find($id);

        $nameAdmin = $ciudadano->nombre_completo;
        $apellidoAdmin = $ciudadano->apellido_completo	;

        $userAdminDelete= $userAdmin[0];
        $userAdminDelete->delete();

        $ciudadano->delete();
        $user->delete();
        
        // return $doctorDelete;
        return back()->with('success', "ADMINISTRADOR: $nameAdmin $apellidoAdmin Eliminado permanente");
    }
}
