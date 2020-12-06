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
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('compra_id')->nullable();
            $table->unsignedBigInteger('agenda_id');

            $table->dateTime('data_consulta');
            $table->string('sala_consulta', 60)->nullable();
            $table->boolean('status_reserva')->default(0);
            $table->boolean('status_finalizado')->nullable();
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compras');
            $table->foreign('paciente_id')->references('id')->on('pessoas');
            $table->foreign('medico_id')->references('id')->on('medicos');
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
