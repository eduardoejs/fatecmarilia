<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Instituicao\Cargo;

class InstituicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->delete();

        Cargo::create([
          'nome' => 'Agente Administrativo',
          'nivel' => 'Ensino Médio',
          'categoria' => 'Técnico Administrativo'
        ]);

        Cargo::create([
          'nome' => 'Analista Técnico Administrativo',
          'nivel' => 'Ensino Superior',
          'categoria' => 'Técnico Administrativo'
        ]);

        Cargo::create([
          'nome' => 'Auxiliar de Docente',
          'nivel' => 'Ensino Médio',
          'categoria' => 'Técnico Administrativo'
        ]);

        Cargo::create([
          'nome' => 'Professor de Ensino Superior I',
          'nivel' => 'Ensino Superior',
          'categoria' => 'Docente'
        ]);
    }
}
