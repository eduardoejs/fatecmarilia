<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(InstituicaoTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);         
         $this->call(PermissionsTableSeeder::class);
         $this->call(RoleUserTableSeeder::class);
         $this->call(AcademicoTableSeeder::class);
         $this->call(AlunosTableSeeder::class);
         $this->call(ExAlunosTableSeeder::class);
    }
}
