<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Administrador del sena',
            'email' => 'bf68209@gmail.com',
            'password' => bcrypt('12345asd'),
            'num_cedula' => '1016948102',
            'direccion' => 'calle 6 sur # 24-57',
            'numero_telefono' => '3225120451',
            'municipio' => 'Mosquera',
            'foto_perfil' => 'img/logo.jpg'

        ]);

        $user->assignRole('Administrador');
    }
}
