<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Users\Aluno;
use Faker\Factory as Faker;

class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
            'role_id' => 4,
            'curso_id' => 1
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
            'role_id' => 4,
            'curso_id' => 1
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
            'role_id' => 4,
            'curso_id' => 2
          ]);
        }
    }
}
