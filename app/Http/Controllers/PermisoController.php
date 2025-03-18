<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermisoRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permisos = Permission::all();
        return view('users.permiso.index',compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // la vista fue hecha con un modal en el mismo index
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermisoRequest $request)
    {
        //
        Permission::create([
            'name' => $request->input('nombre_permiso'),
            'description' => $request->input('descripcion_permiso'),
        ]);
        return back()->with('success',"Permiso: $request->nombre_permiso registrado exitosamente");
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
        $permisos = Permission::find($id);
        $roles = Role::all();
        
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
