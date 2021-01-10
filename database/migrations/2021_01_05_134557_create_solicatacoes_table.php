<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicatacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicatacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('especialidade_id');

            $table->string('conselho', 100);
            $table->string('num_conselho', 100);
            $table->string('rqe', 100);

            $table->string('rg', 13);
            $table->string('telefone', 15)->nullable();
            $table->string('celular', 17)->nullable();

            $table->string('procedimento', 500);

            $table->boolean('status')->default(0);
            $table->boolean('enviado_confirmacao')->default(0);
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicatacoes');
    }
}
