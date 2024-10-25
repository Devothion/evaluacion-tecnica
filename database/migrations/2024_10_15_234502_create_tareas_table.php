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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clave foránea de la tabla de usuarios
            $table->string('dni', 8); // DNI de 8 dígitos
            $table->string('titulo');
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->date('fecha_vencimiento');
            $table->enum('estado', ['pendiente', 'en_progreso', 'completada']); // Estado con valores limitados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
