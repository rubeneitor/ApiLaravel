<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');                            //id del usuario
            $table->string('nombre');                               //nombre del usuario
            $table->string('email')->unique();                      //emial del usuario
            $table->string('contraseña');                           //contraseña el usuario
            $table->string('resSecreta');                           //respuesta secreta recuperacion contraseña
            $table->string('preSecreta');                           //pregunta secreta recuperacion contraseña
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
