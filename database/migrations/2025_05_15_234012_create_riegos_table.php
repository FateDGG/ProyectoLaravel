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
        Schema::create('riegos', function (Blueprint $table) {
            $table->id(); // id_riego auto-incremental (clave primaria 'id')
            // Crea la columna dispositivo_id y la define como clave foránea
            // referenciando la columna 'id' de la tabla 'dispositivos'.
            $table->foreignId('dispositivo_id')->constrained('dispositivos')->onDelete('cascade');
            $table->timestamp('fecha'); // Fecha y hora del riego
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riegos');
    }
};