<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignarpermisoUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
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
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        $role = Role::all();
         // Obtén los permisos asignados al rol
        $rolesAsignadosuser = $user->roles->pluck('id')->toArray();

        return ['user' => $user, 
                'roles' => $role, 
                'rolesAsignadosuser' => $rolesAsignadosuser,
        ];
        // return view('users.asignar_permisos', compact('user', 'rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return back()->with('success', "Permisos actualizados al usuario $user->namae correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $usuario = User::find($id);
        $usuario->delete();
        
        return redirect()->back()->with('success', "Usuario: $usuario->name eliminado permanente");
    }
}
