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
            $table->string('matricula', 100)->unique(); //Matricula do SIGA
            $table->string('cpf', 11)->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('termo')->unsigned(); //Termo do qual o aluno está cursando
            $table->char('turno', 1); //Se o aluno está na Manhã (M) ou Noite (N)
            $table->char('sexo', 1);
            $table->boolean('trancado')->default(false); //Define se está com a matrícula trancada (curso trancado). Se sim o "status" deverá ser alterado para false
            $table->boolean('status')->default(true); //Se está ativo ou inativo

            //Criando o relacionamento com a tabela de Role (perfil)
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            //Criando o relacionamento com a tabela de tipo de cursos
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
        Schema::dropIfExists('alunos');
    }
}
