<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdemServico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('ordem_servico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')-> unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario');
            $table->integer('funcionario_id')-> unsigned();
            $table->foreign('funcionario_id')->references('id')->on('funcionario');
            $table->string('obs');
            $table->string('data');
            $table->string('status');
            $table->string('ordem_servico'); 
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
        Schema::dropIfExists('ordem_servico');
    }
}
