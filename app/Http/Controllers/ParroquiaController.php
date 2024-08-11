<?php

namespace App\Http\Controllers;

use App\Models\Parroquia;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    //
    public function getParroquia($municipioId){
        $parroquias = Parroquia::where('municipio_id',$municipioId)->pluck('parroquias', 'id');

        return response()->json($parroquias);
    }
}
