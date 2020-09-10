<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdemPecas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_pecas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pecas_id')-> unsigned();
            $table->foreign('pecas_id')->references('id')->on('pecas');
            $table->integer('ordem_servico_id')-> unsigned();
            $table->foreign('ordem_servico_id')->references('id')->on('ordem_servico');
            $table->string('obs');
            $table->string('data');
            $table->string('quantidade');
            $table->string('valor_mo');
            $table->string('valor_peca');
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
         Schema::dropIfExists('ordem_pecas');
    }
}
