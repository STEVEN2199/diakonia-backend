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
