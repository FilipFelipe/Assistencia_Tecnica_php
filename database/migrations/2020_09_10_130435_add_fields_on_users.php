<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsOnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
            $table->string('profile_pic')->nullable();
            $table->boolean('is_active')->default(0);
            //$table->string('sexo',1);
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
