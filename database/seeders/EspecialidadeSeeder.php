<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $especialidad = Especialidade::create(['especialidad' => 'INTERNISTA']);
        $especialidad = Especialidade::create(['especialidad' => 'CARDIOLOGÍA']);
        $especialidad = Especialidade::create(['especialidad' => 'DERMATOLOGÍA']);
        $especialidad = Especialidade::create(['especialidad' => 'ENDOCRINÓLOGO']);
        $especialidad = Especialidade::create(['especialidad' => 'PEDIATRA']);
        $especialidad = Especialidade::create(['especialidad' => 'OBSTETRICIA']);
        $especialidad = Especialidade::create(['especialidad' => 'PSIQUIATRÍA']);
        $especialidad = Especialidade::create(['especialidad' => 'OFTALMOLOGÍA']);
    }
}
