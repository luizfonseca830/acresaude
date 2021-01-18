<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_medicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_especialidade_id');
            $table->unsignedBigInteger('medico_id');
            $table->string('title', 100);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('intervalo')->default('15');
            $table->string('description', 100)->nullable();
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('medico_especialidade_id')->references('id')->on('medico_especialidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_medicos');
    }
}
