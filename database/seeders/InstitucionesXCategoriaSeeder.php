<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionesXCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1 -> oro; 2 -> plata; 3 -> bronce

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2018,
            'id_institucion' => 72,
            'puesto' => 1,
            'categoria' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2018,
            'id_institucion' => 85,
            'puesto' => 1,
            'categoria' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2018,
            'id_institucion' => 153,
            'puesto' => 1,
            'categoria' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2019,
            'id_institucion' => 73,
            'puesto' => 1,
            'categoria' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2019,
            'id_institucion' => 86,
            'puesto' => 1,
            'categoria' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2019,
            'id_institucion' => 154,
            'puesto' => 1,
            'categoria' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2020,
            'id_institucion' => 82,
            'puesto' => 1,
            'categoria' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2020,
            'id_institucion' => 95,
            'puesto' => 1,
            'categoria' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2020,
            'id_institucion' => 163,
            'puesto' => 1,
            'categoria' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2021,
            'id_institucion' => 83,
            'puesto' => 1,
            'categoria' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2021,
            'id_institucion' => 96,
            'puesto' => 1,
            'categoria' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2021,
            'id_institucion' => 164,
            'puesto' => 1,
            'categoria' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2022,
            'id_institucion' => 76,
            'puesto' => 1,
            'categoria' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2022,
            'id_institucion' => 89,
            'puesto' => 1,
            'categoria' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2022,
            'id_institucion' => 113,
            'puesto' => 1,
            'categoria' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2023,
            'id_institucion' => 102,
            'puesto' => 1,
            'categoria' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2023,
            'id_institucion' => 105,
            'puesto' => 1,
            'categoria' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mejores_instituciones_x_categoria')->insert([
            'anio' => 2023,
            'id_institucion' => 53,
            'puesto' => 1,
            'categoria' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
