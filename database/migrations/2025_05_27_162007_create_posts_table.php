<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();                      
            $table->string('titulo');                  
            $table->string('slug')->unique();           
            $table->text('cuerpo');                       
            $table->timestamp('fecha_de_publicacion')      
                ->nullable();
            $table->foreignId('id_usuario')                
                ->constrained('users')
                ->onDelete('cascade');
            $table->timestamps();                          
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
