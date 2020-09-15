<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('materiais');
            $table->string('metodo');
            $table->string('palavras_chave');
           // $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade')->onUpdate('cascade');
           $table->string('autor');
           $table->float('avaliacao')->nullable();
           
           $table->unsignedBigInteger("area_atuacao");
           $table->unsignedBigInteger("area_conhecimento");
           
           $table->foreign('area_atuacao')->references('id')->on('area_atuacaos')
           ->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('area_conhecimento')->references('id')->on('area_conhecimentos')
           ->onDelete('cascade')->onUpdate('cascade');

          // $table->unsignedBigInteger('autor_id');
           //  $table->foreign('autor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           $table->boolean('is_requisicao');
           $table->string('video')->nullable();
           $table->string('video_url')->nullable();
           // $table->foreign('area_id')->references('id')->on('area_atuacaos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('metodologias');
    }
}
