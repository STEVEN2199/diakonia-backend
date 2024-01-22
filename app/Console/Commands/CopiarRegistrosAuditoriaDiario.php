<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class CopiarRegistrosAuditoriaDiario extends Command
{
    protected $signature = 'copiar:registros_auditoria_diario';
    protected $description = 'Copia los registros de la tabla institucion a institucion_auditoria';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fechaActual = now();
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
    }
}
