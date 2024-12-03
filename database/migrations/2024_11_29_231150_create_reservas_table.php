<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Columna para el usuario
            $table->unsignedBigInteger('cancha_id'); // Columna para la cancha
            $table->time('hora'); // Cambiar a tipo 'time'
            $table->timestamps();

            // Relaciones de claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cancha_id')->references('id')->on('canchas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
