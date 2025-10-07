<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->foreignId('vuelo_id')->constrained()->onDelete('cascade');
            $table->dateTime('fecha_reserva');
            $table->integer('asientos')->default(1);
            $table->timestamps();

            $table->unique(['cliente_id', 'vuelo_id']); // evitar doble reserva
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
