<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('role_aluno', function(Blueprint $table){
        $table->increments('id');
        $table->integer('role_id')->unsigned();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->integer('aluno_id')->unsigned();
        $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
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
        Schema::dropIfExists('role_aluno');
    }
}
