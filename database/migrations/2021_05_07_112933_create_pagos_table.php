<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');                                    //id
            $table->string('tipoPago');                                     //tipo de pago
            $table->integer('importe');                                     //importe del pago
            $table->string('estado');                                       //estado del pago
            $table->unsignedBigInteger('idUsuario');                        //id del usuario
            $table->foreign('idUsuario', 'fk_pagos_usuarios')               //relacion entre la tabla pagos y usuarios
            ->on('usuarios')
            ->references('id')
            ->onDelete('restrict');
            $table->unsignedBigInteger('idBanco');                          //id del banco
            $table->foreign('idBanco', 'fk_pagos_bancos')                   //relacion entre la tabla pagos y bancos
            ->on('bancos')
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
        Schema::dropIfExists('pagos');
    }
}
