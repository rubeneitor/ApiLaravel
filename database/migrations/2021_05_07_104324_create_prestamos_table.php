<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');                                        //id del prestamos
            $table->integer('importe');                                         //importe del prestamo
            $table->integer('intereses');                                       //intereses del prestamo
            $table->unsignedBigInteger('idUsuario');                            //id del usuario
            $table->foreign('idUsuario', 'fk_prestamos_usuariosId')             //relacion entre la tabla prestamos y usuarios
            ->on('usuarios')
            ->references('id')
            ->onDelete('restrict');
            $table->unsignedBigInteger('idBanco');                              //id del banco
            $table->foreign('idBanco', 'fk_pretamos_bancos')                    //relacion entre la tabla prestamos y bancos
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
        Schema::dropIfExists('prestamos');
    }
}
