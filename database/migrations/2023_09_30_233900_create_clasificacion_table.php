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
        Schema::create('clasificacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_clasificacion',200);
            $table->boolean('condicion');
            $table->foreignId('institucion_id')->constrained('institucion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clasificacion');
    }
};
