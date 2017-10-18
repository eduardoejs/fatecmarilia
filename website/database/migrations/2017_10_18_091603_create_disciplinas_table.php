<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('cargaHoraria')->unsigned(); //Carga horaria da disciplina
            $table->integer('semestre')->unsigned(); //Em que semestre a disiplina é ministrada
            $table->string('codigo_siga')->nullable(); //Codigo da disciplina no SIGA

            //Criando o relacionamento com a tabela de grade de disciplinas
            $table->integer('grade_disciplina_id')->unsigned();
            $table->foreign('grade_disciplina_id')->references('id')->on('grade_disciplinas')->onDelete('cascade');

            //Criando o relacionamento com a tabela de cursos
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');

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
        Schema::dropIfExists('disciplinas');
    }
}
