<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Users\User;
use App\Models\Admin\NivelAcesso\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vinculo o Perfil de administrador ao primeiro usuario cadastrado no banco de dados
        $user = User::find(1);//administrador
        $role = Role::whereName('ADMINISTRADOR')->first();
        $user->setRole($role);

        $user = User::find(2);
        $role = Role::whereName('FUNCIONARIO')->first();
        $user->setRole($role);

        $user = User::find(2);
        $role = Role::whereName('DOCENTE')->first();
        $user->setRole($role);

        /*$roleAluno = Role::whereName('ALUNO')->first();
        $users = User::all();
        foreach ($users as $key => $user) {
          if($user->id != 1 && $user->id != 2)
          {
            $user->setRole($roleAluno);
          }
        }*/
    }
}
