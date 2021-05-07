<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->bigIncrements('id');                                //id del banco
            $table->integer('numCuenta');                               //numero de cuenta
            $table->string('oficina');                                  //oficina de la cuenta bancaria
            $table->unsignedBigInteger('idUsuario');                    //id del usuario
            $table->foreign('idUsuario', 'fk_bancos_usuariosId')        //relacion entre la tabla bancos y usuarios
            ->on('usuarios')
            ->references('id')
            ->onDelete('restrict');
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
        Schema::dropIfExists('bancos');
    }
}
