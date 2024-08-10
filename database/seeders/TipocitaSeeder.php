<?php

namespace Database\Seeders;

use App\Models\Tipocita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipocitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA GENERAL']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA DE CONTROL DE HIPERTENSIÓN']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA DE CONTROL DE COLESTEROL']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA DERMATOLÓGICA']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA DE CONTROL DE DIABETES']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA PEDIÁTRICA']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA PRENATAL']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA POSNATAL']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA DE SALUD MENTAL']);
        $tipocita = Tipocita::create(['nombre_cita' => 'CONSULTA DE OFTALMOLOGÍA']);
    }
}
