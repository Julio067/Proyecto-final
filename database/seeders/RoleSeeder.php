<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Administrador']);
        $role2 = Role::create(['name'=> 'Usuario']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'administrador'])->syncRoles([$role1]);


        
    }
}
