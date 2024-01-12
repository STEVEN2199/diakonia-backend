<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('beneficiarios_x_anio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anio');
            $table->unsignedBigInteger('numero_instituciones');
            $table->unsignedBigInteger('numero_beneficiarios');
            $table->timestamps();
        });

        Schema::create('instituciones_x_estado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anio');
            $table->unsignedBigInteger('numero_instituciones');
            $table->unsignedBigInteger('numero_instituciones_activas');
            $table->unsignedBigInteger('numero_instituciones_pasivas');
            $table->timestamps();
        });

        // Schema::create('mejores_instituciones_x_categoria', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('anio');
        //     $table->unsignedBigInteger('id_institucion');
        //     $table->unsignedBigInteger('puesto');
        //     $table->unsignedBigInteger('categoria');
        //     $table->foreign('institucion_id')->references('id')->on('institucion');
        //     $table->timestamps();
        // });

        // Schema::create('instituciones_x_estado', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('anio');
        //     $table->unsignedBigInteger('numero_instituciones');
        //     $table->unsignedBigInteger('numero_instituciones_activas');
        //     $table->unsignedBigInteger('numero_instituciones_pasivas');
        //     $table->timestamps();
        // });
        

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('beneficiarios_x_anio');
    }
};
