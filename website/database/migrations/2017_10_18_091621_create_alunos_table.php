<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('matricula', 50)->unique(); //Matricula do SIGA
            $table->string('cpf', 11)->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('termo')->unsigned(); //Termo do qual o aluno está cursando
            $table->char('turno', 1)->nullable(); //Se o aluno está na Manhã (M) ou Noite (N) ou null quando for aluno de EaD
            $table->char('sexo', 1);
            $table->boolean('trancado')->default(false); //Define se está com a matrícula trancada (curso trancado). Se sim o "status" deverá ser alterado para false
            $table->boolean('status')->default(true); //Se está ativo ou inativo

            //Criando o relacionamento com a tabela de tipo de cursos
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');

            $table->rememberToken();
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
        // Desabilito a checakem de ForeignKeys para não apresentar erros quando executar um rollback ou migrate refresh
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('alunos');
        Schema::enableForeignKeyConstraints();
    }
}
