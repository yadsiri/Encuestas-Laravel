<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('opciones', function (Blueprint $table) {
            $table->id();
            $table->string('opcion');
            $table->foreignId('encuesta_id')->constrained()->onDelete('cascade');
            $table->integer('votos')->default(0); // Contador de votos
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('poll_options');
    }
}

