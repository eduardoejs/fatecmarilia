<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations. Armazena os dados dos usuários do sistema, que serão identificados pelo cargo associado ao mesmo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('cpf', 11)->unique();
            $table->string('titulacao')->nullable(); //Se tem mestrado, doutorado, especializacao, etc
            $table->char('sexo', 1);
            $table->string('url_lattes')->nullable(); //Link do currículo Lattes

            //Criando o relacionamento com a tabela de cargos
            $table->integer('cargo_id')->unsigned()->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');

            $table->boolean('status')->default(true); //Se está ativo ou inativo

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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
