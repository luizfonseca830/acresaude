<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doutor_id');
            $table->date('data_consulta');
            $table->string('sala_consulta', 60);
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pessoas');
            $table->foreign('doutor_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_consultas');
    }
}
