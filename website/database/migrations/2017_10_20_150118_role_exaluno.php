<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleExaluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('role_exaluno', function(Blueprint $table){
        $table->increments('id');
        $table->integer('role_id')->unsigned();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->integer('ex_aluno_id')->unsigned();
        $table->foreign('ex_aluno_id')->references('id')->on('alunos')->onDelete('cascade');
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
        Schema::dropIfExists('role_exaluno');
    }
}
