<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fornecedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->increments('fornecedor_id');
            $table->string('nome_fantasia');
            $table->string('razao_social');
            $table->string('cnpj');
            $table->string('telefone');
            $table->string('rua');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cep'); 
            $table->string('bairro');
            $table->string('uf');  
            $table->string('complemento');
            $table->string('numero');
            $table->string('cidade');
            $table->string('ativo');
            $table->string('contrato');
            $table->string('pais');
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
        Schema::dropIfExists('fornecedor');
    }
}
