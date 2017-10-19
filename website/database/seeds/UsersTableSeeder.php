<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Users\User;
use App\Models\Admin\Instituicao\Cargo;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      User::create([
        'name' => 'ADMIN USER',
        'email' => 'admin@admin.br',
        'password' => bcrypt('123456'),
        'cpf' => '00000000000',
        'titulacao' => null,
        'cargo_id' => null,
        'sexo' => 'M',
        'url_lattes' => null,
        'status' => 1,
      ]);

      $faker = Faker::create();
      $cargo = Cargo::find(2);

      foreach (range(1,5) as $index) {
        User::create([
          'name' => strtoupper($faker->name),
          'email' => $faker->unique()->safeEmail,
          'cpf' => str_random(11),
          'titulacao' => null,
          'cargo_id' => $cargo->id,
          'sexo' => 'F',
          'url_lattes' => null,
          'password' => bcrypt('123456'),
          //'status' => 1, //usuario ativo - default true
          'remember_token' => str_random(10),
        ]);
      }

      $cargo = Cargo::find(3);
      foreach (range(1,5) as $index) {
        User::create([
          'name' => strtoupper($faker->name),
          'email' => $faker->unique()->safeEmail,
          'cpf' => str_random(11),
          'titulacao' => null,
          'cargo_id' => $cargo->id,
          'sexo' => 'F',
          'url_lattes' => null,
          'password' => bcrypt('123456'),
          'status' => 0, //usuario inativo
          'remember_token' => str_random(10),
        ]);
      }
    }
}
