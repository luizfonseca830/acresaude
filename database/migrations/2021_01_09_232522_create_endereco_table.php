<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');

            $table->string('uf', 10);
            $table->string('cep', 100);
            $table->string('endereco', 100);
            $table->string('bairro', 100);
            $table->string('municipio', 100);
            $table->string('complemento', 250)->nullable();

            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
}
