<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitudCitaRequest;
use App\Models\EspecialidadesTipocita;
use App\Models\Estatus;
use App\Models\Paciente;
use App\Models\SolicitudCita;
use App\Models\Tipocita;
use App\Models\Viewpostgres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SolicitudCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //Acceder al usuario atenticado
        $userAuth = Auth::user();
        $tipocitas = Tipocita::all();
        // view postgres
        $viewpostgres = new Viewpostgres();
        $data_citas_view=$viewpostgres->citasmedicas_view($userAuth->id,$userAuth->hasRole('administrador'));        

        return view('solicitud_cita.index',compact('tipocitas','data_citas_view'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolicitudCitaRequest $request)
    {
        //
        //Acceder al usuario atenticado
        $userAuth = Auth::user();
        $paciente = Paciente::where('user_id',$userAuth->id)->first();

        $tipocitas = Tipocita::find($request->tipocita);
        
        // estatus
        $estatu = Estatus::find(2); // obtengo el estus id: 2-pendiente
        // filtrar especilidad segun el tipo de cita
        $especialidad_tipocita =  EspecialidadesTipocita::find($request->tipocita);
        $cita = SolicitudCita::create([
            'fecha_cita' => $request->fecha_cita,
            'hora_cita' => $request->hora_cita,
            'tipocita_id' => $request->tipocita,
            'estatu_id' => $estatu->id,
            'paciente_id' => $paciente->id,
            'especialidad_tipocita_id' => $especialidad_tipocita->id,
        ]);
        
        return back()->with('success', "Su solicitud $tipocitas->nombre_cita  se realizo exitosamente");
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
