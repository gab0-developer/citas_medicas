<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW \"citas_medicas_view\" AS SELECT sc.id,
    tp.nombre_cita,
    concat(ci.nombre_completo, ' ', ci.apellido_completo) AS paciente,
    sc.fecha_cita,
    sc.hora_cita,
    es.estatu,
    sc.observacion,
    sc.estatu_id,
    sc.especialidad_tipocita_id,
    sc.paciente_id,
    pa.user_id
   FROM (((((solicitud_citas sc
     JOIN tipocitas tp ON ((tp.id = sc.tipocita_id)))
     JOIN estatus es ON ((es.id = sc.estatu_id)))
     JOIN pacientes pa ON ((pa.id = sc.paciente_id)))
     JOIN ciudadanos ci ON ((ci.id = pa.ciudadano_id)))
     JOIN especialidades_tipocitas et ON ((et.id = sc.especialidad_tipocita_id)));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"citas_medicas_view\"");
    }
};
