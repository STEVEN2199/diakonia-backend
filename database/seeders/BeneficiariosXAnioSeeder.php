<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiariosXAnioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('beneficiarios_x_anio')->insert([
            'anio' => 2018,
            'numero_instituciones' => 46,
            'numero_beneficiarios' => 18287,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beneficiarios_x_anio')->insert([
            'anio' => 2019,
            'numero_instituciones' => 82,
            'numero_beneficiarios' => 30152,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beneficiarios_x_anio')->insert([
            'anio' => 2020,
            'numero_instituciones' => 123,
            'numero_beneficiarios' => 41486,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beneficiarios_x_anio')->insert([
            'anio' => 2021,
            'numero_instituciones' => 154,
            'numero_beneficiarios' => 54355,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beneficiarios_x_anio')->insert([
            'anio' => 2022,
            'numero_instituciones' => 173,
            'numero_beneficiarios' => 52993,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beneficiarios_x_anio')->insert([
            'anio' => 2023,
            'numero_instituciones' => 174,
            'numero_beneficiarios' => 51441,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
