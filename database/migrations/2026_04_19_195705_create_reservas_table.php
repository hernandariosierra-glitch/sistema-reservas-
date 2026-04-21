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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                  ->constrained('clientes')
                  ->onDelete('restrict');

            $table->foreignId('vehiculo_id')
                  ->constrained('vehiculos')
                  ->onDelete('restrict');

            $table->foreignId('chofer_id')
                  ->nullable()
                  ->constrained('chofers') // IMPORTANTE: tu tabla probablemente se llama chofers
                  ->onDelete('restrict');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->string('estado')->default('pendiente');
            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};