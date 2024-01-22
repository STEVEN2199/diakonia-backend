<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CopiarRegistrosAuditoria extends Command
{


    protected $signature = 'copiar:registros_auditoria';
    protected $description = 'Copia los registros de la tabla institucion a institucion_auditoria el 31 de diciembre de cada año';

    public function handle()
    {
        $fechaActual = now();
        
        if ($fechaActual->month == 12 && $fechaActual->day == 31) {
            // Solo se ejecutará el 31 de diciembre de cada año

            $registros = DB::table('institucion')->get();

            foreach ($registros as $registro) {
                DB::table('institucion_auditoria')->insert([
                    'nombre' => $registro->nombre,
                    'representante_legal' => $registro->representante_legal,
                    'ruc' => $registro->ruc,
                    'numero_beneficiarios' => $registro->numero_beneficiarios,
                    'anio' => $fechaActual->year,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            

            $this->info('Registros copiados exitosamente.');
        } else {
            $this->info('Hoy no es 31 de diciembre, no se ejecutará la copia de registros.');
        }
    }
}

