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
        // Schema::create('mejores_instituciones_x_categoria', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('anio');
        //     $table->unsignedBigInteger('id_institucion');
        //     $table->unsignedBigInteger('puesto');
        //     $table->unsignedBigInteger('categoria');
        //     $table->timestamps();
        // });

        Schema::create('institucion_auditoria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('representante_legal',250);
            $table->string('ruc',200);
            $table->integer('numero_beneficiarios');
            $table->integer('anio');
            $table->timestamps();
        });
    
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('institucion_auditoria');

    }
};
