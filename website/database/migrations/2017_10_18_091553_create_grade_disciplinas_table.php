<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_siga', 50)->nullable(); //Código da grade de disciplinas no SIGA
            $table->string('descricao', 200); //Descricao da grade
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
        Schema::dropIfExists('grade_disciplinas');
    }
}
