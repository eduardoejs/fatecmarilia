<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DisciplinaDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('disciplina_docente', function (Blueprint $table) {
          $table->increments('id');

          //Criando o relacionamento com a tabela de Disciplinas
          $table->integer('disciplina_id')->unsigned();
          $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');

          //Criando o relacionamento com a tabela de Users
          //Relacionao com Users, pois posso ter um usuário associado a categoria de Docente.
          //Quando essa associação é feita, o usuário fica "habilitado" a ser vinculado à uma disciplina
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('disciplina_docente');
    }
}
