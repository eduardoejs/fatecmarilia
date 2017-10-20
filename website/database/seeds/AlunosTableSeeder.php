<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Users\Aluno;
use App\Models\Admin\NivelAcesso\Role;
use Faker\Factory as Faker;

class AlunosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('alunos')->delete();

        $faker = Faker::create();

        foreach (range(1,10) as $index) {
          Aluno::create([
            'nome' => strtoupper($faker->name),
            'matricula' => str_random(20),
            'cpf' => str_random(11),
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'status' => 1,
            'termo' => 1,
            'turno' => 'M',
            'trancado' => 0,
            'sexo' => 'M',
            'curso_id' => 1,
            'remember_token' => str_random(10),
          ]);
        }

        foreach (range(1,10) as $index) {
          Aluno::create([
            'nome' => strtoupper($faker->name),
            'matricula' => str_random(20),
            'cpf' => str_random(11),
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'status' => 1,
            'termo' => 1,
            'turno' => 'N',
            'trancado' => 0,
            'sexo' => 'F',
            'curso_id' => 1,
            'remember_token' => str_random(10),
          ]);
        }

        foreach (range(1,10) as $index) {
          Aluno::create([
            'nome' => strtoupper($faker->name),
            'matricula' => str_random(20),
            'cpf' => str_random(11),
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'status' => 1,
            'termo' => 1,
            'turno' => null,
            'trancado' => 0,
            'sexo' => 'F',
            'curso_id' => 2,
            'remember_token' => str_random(10),
          ]);
        }

        $roleAluno = Role::whereName('ALUNO')->first();
        $users = Aluno::all();
        foreach ($users as $key => $user) {
          $user->setRole($roleAluno);          
        }
    }
}
