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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();                                // id
            $table->foreignId('user_id')                 // quién reserva (usuarios)
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->date('fecha');                       // día de la cita
            $table->time('hora');                        // hora de la cita
            $table->string('motivo')->nullable();        // opcional: motivo o descripción breve
            $table->timestamps();                        // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
