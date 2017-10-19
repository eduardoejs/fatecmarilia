<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Users\ExAluno;
use Faker\Factory as Faker;

class ExAlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ex_alunos')->delete();

      $faker = Faker::create();
      foreach (range(1,10) as $index) {
        ExAluno::create([
          'nome' => strtoupper($faker->name),
          'matricula' => str_random(20),
          'cpf' => str_random(11),
          'email' => $faker->unique()->safeEmail,
          'password' => bcrypt('123456'),
          'status' => 1,
          'sexo' => 'M',
          'role_id' => 5,
          'curso_id' => 1
        ]);
      }
    }
}
