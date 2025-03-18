<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('users.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.roles.register_rol');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request)
    {
        //
        Role::create([
            'name' => $request->nombre_rol
            // 'guard_name' => 'web'
        ]);
        return back()->with('success',"Rol: $request->nombre_rol registrado exitosamente");
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
        $rol= Role::find($id);
        $permisos = Permission::all();
        // Obtén los permisos asignados al rol
        $permisosAsignados = $rol->permissions->pluck('id')->toArray();
        return ['roles'=>$rol,'permisos' => $permisos, 'permisosAsignados' => $permisosAsignados];
        // return view('users.roles.edit_rol', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    // defino una instancia de ROLE.
    public function update(Request $request, string $id)
    {
        // permissions: la relacion de roles que proviene del modelo permissions del pligins laravel permission
        // sync: sincroniza los permisos con los seleccionados en el formulario
        // $rol->permissions()->sync($request->permisos);
        $rol= Role::find($id);
        $rol->update([
            'name' =>$request->nombre_rol
        ]);
        $rol->permissions()->sync($request->permisos);
        return back()->with('success',"permisos asignado al $rol->name exitosamente");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
