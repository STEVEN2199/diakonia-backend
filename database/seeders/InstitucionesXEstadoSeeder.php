<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitucionesXEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('instituciones_x_estado')->insert([
            'anio' => 2018,
            'numero_instituciones' => 46,
            'numero_instituciones_activas' => 39,
            'numero_instituciones_pasivas' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('instituciones_x_estado')->insert([
            'anio' => 2019,
            'numero_instituciones' => 82,
            'numero_instituciones_activas' => 52,
            'numero_instituciones_pasivas'=> 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('instituciones_x_estado')->insert([
            'anio' => 2020,
            'numero_instituciones' => 123,
            'numero_instituciones_activas' => 110,
            'numero_instituciones_pasivas' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('instituciones_x_estado')->insert([
            'anio' => 2021,
            'numero_instituciones' => 154,
            'numero_instituciones_activas' => 134,
            'numero_instituciones_pasivas' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('instituciones_x_estado')->insert([
            'anio' => 2022,
            'numero_instituciones' => 173,
            'numero_instituciones_activas' => 133,
            'numero_instituciones_pasivas' => 40,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('instituciones_x_estado')->insert([
            'anio' => 2023,
            'numero_instituciones' => 174,
            'numero_instituciones_activas' => 134,
            'numero_instituciones_pasivas' => 37,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
