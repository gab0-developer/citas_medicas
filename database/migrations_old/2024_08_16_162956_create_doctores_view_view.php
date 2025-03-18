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
        DB::statement("CREATE VIEW \"doctores_view\" AS SELECT ci.cedula,
    ci.nombre_completo,
    ci.apellido_completo,
    ep.especialidad,
    dt.mpps,
    ci.sexo,
    ci.fecha_nacimiento,
    ci.correo,
    ci.nro_telefono,
    ci.nro_tlf_secundario,
    es.estados,
    mu.municipios,
    pa.parroquias,
    ci.fecha_registro,
    ci.id AS id_ciudadano,
    dt.user_id
   FROM ((((((doctores dt
     JOIN ciudadanos ci ON ((ci.id = dt.ciudadano_id)))
     JOIN especialidades ep ON ((ep.id = dt.especialidad_id)))
     JOIN users us ON ((us.id = dt.user_id)))
     JOIN estados es ON ((es.id = ci.estado_id)))
     JOIN municipios mu ON ((mu.id = ci.municipio_id)))
     JOIN parroquias pa ON ((pa.id = ci.parroquia_id)));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"doctores_view\"");
    }
};
