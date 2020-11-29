<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->string('nome', 250);
            $table->string('sobrenome', 150);
            $table->string('cpf', 30);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_usuario_id')->references('id')->on('tipos_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
