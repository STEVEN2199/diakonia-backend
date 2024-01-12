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
        Schema::create('mejores_instituciones_x_categoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anio');
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('puesto');
            $table->unsignedBigInteger('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('mejores_instituciones_x_categoria');

    }
};
