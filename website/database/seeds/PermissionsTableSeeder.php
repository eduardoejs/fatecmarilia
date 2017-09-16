<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\NivelAcesso\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        /*  =============================================================== */
        Permission::create([
          'name' => 'CREATE User',
          'description' => 'Permite CRIAR um usuário',
          'slug' => 'create-user',
        ]);
        Permission::create([
          'name' => 'READ User',
          'description' => 'Permite LER/ACESSAR os dados de um usuário',
          'slug' => 'read-user',
        ]);
        Permission::create([
          'name' => 'UPDATE User',
          'description' => 'Permite EDITAR um usuário',
          'slug' => 'update-user',
        ]);
        Permission::create([
          'name' => 'DELETE User',
          'description' => 'Permite EXCLUIR um usuário',
          'slug' => 'delete-user',
        ]);
        Permission::create([
          'name' => 'SET STATUS User',
          'description' => 'Permite ALTERAR o status do Usuário',
          'slug' => 'set-status-user',
        ]);
        /*  =============================================================== */
        Permission::create([
          'name' => 'CREATE Permission',
          'description' => 'Permite CRIAR uma nova permissão',
          'slug' => 'create-permission',
        ]);
        Permission::create([
          'name' => 'READ Permission',
          'description' => 'Permite LER/ACESSAR uma permissão',
          'slug' => 'read-permission',
        ]);
        Permission::create([
          'name' => 'UPDATE permission',
          'description' => 'Permite EDITAR uma permissão',
          'slug' => 'update-permission',
        ]);
        Permission::create([
          'name' => 'DELETE permission',
          'description' => 'Permite EXCLUIR uma permissão',
          'slug' => 'delete-permission',
        ]);
        Permission::create([
          'name' => 'SET Role User',
          'description' => 'Permite VINCULAR um Perfil à um Usuário',
          'slug' => 'set-role-user',
        ]);
        Permission::create([
          'name' => 'SET Permission Role',
          'description' => 'Permite VINCULAR uma Permissão à um Perfil',
          'slug' => 'set-permission-role',
        ]);
    }
}
