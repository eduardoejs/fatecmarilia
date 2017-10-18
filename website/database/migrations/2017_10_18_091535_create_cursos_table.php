<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 200);
            $table->integer('cargaHoraria')->unsigned(); //carga hoarária total do curso
            $table->integer('duracao')->unsigned(); //tempo de duracao do curso (em meses)

            //Criando o relacionamento com a tabela de tipo de cursos
            $table->integer('tipo_curso_id')->unsigned();
            $table->foreign('tipo_curso_id')->references('id')->on('tipo_cursos')->onDelete('cascade');

            //Criando o relacionamento com a tabela de modalidade de cursos
            $table->integer('modalidade_curso_id')->unsigned();
            $table->foreign('modalidade_curso_id')->references('id')->on('modalidade_cursos')->onDelete('cascade');

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
        Schema::dropIfExists('cursos');
    }
}
