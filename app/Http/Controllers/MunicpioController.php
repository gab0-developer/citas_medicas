<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicpioController extends Controller
{
    //
    public function getMunicipio($estadoId){
        $municipios = Municipio::where('estado_id',$estadoId)->pluck('municipios', 'id');

        return response()->json($municipios);
    }
    
}
