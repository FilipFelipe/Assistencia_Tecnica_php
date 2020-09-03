<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FornecedorPecas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor_pecas', function (Blueprint $table) {
            $table->increments('fornecedor_pecas_id');
            $table->integer('fornecedor_id')-> unsigned();
            $table->foreign('fornecedor_id')->references('fornecedor_id')->on('fornecedor');
            $table->integer('pecas_id')-> unsigned();
            $table->foreign('pecas_id')->references('pecas_id')->on('pecas');
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
        Schema::dropIfExists('fornecedor_pecas');
    }
}
