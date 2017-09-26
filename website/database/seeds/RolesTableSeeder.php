<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\NivelAcesso\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
          'name' => 'ADMINISTRADOR',
          'description' => 'Perfil de usuário ADMINISTRADOR do sistema',
          'slug' => 'administrador',
        ]);

        Role::create([
          'name' => 'DOCENTE',
          'description' => 'Perfil de usuário do tipo DOCENTE',
          'slug' => 'docente',
        ]);

        Role::create([
          'name' => 'FUNCIONARIO',
          'description' => 'Perfil de usuário do tipo FUNCIONARIO',
          'slug' => 'funcionario',
        ]);

        Role::create([
          'name' => 'ALUNO',
          'description' => 'Perfil de usuário do tipo ALUNO',
          'slug' => 'aluno',
        ]);

        Role::create([
          'name' => 'EX-ALUNO',
          'description' => 'Perfil de usuário do tipo EX-ALUNO',
          'slug' => 'ex-aluno',
        ]);
    }
}
