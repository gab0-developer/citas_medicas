<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Viewpostgres extends Model
{
    use HasFactory;

    public function citasmedicas_view($data,$rol)
    {
        // ! el rol debe ser doctor e incluir especialidad del doctor autenticado [correccion importalte]
        if ($rol == 'administrador') {
            # code...
            return DB::table('citas_medicas_view')->get();
        }
        if ($rol == 'doctor') {

            if (is_array($data)) {
                # code...
                return DB::table('citas_medicas_view')->whereIn('especialidad_tipocita_id',$data)->get();
            }else{

                return DB::table('citas_medicas_view')->where('especialidad_tipocita_id',$data)->get();
            }
        }
        
        $dataview =DB::table('citas_medicas_view')->where('user_id',$data)->get();
        return  $dataview;
    }
    public function citasmedicas_estatus_view($data,$estatus)
    {
        
        $dataview =DB::table('citas_medicas_view')->where('especialidad_tipocita_id',$data)->where('estatu_id',$estatus)->get();
        return  $dataview;
    }
    public function doctores_view($id_ciudadano = null)
    {
        if ($id_ciudadano == null) {
            return DB::table('doctores_view')->get();
        }

        $dataview =DB::table('doctores_view')->where('id_ciudadano',$id_ciudadano)->get();
        return  $dataview;
    }

}
