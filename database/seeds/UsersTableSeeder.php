<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Creación del usuario
        $user = User::create([
            'name'           => 'admin',
            'email'          => 'admin@gmail.com',
            'password'       => bcrypt('12345678'),
            'career'         => 'Ninguna',
            'activity'       => 'Ninguna',
            'control_number' => '2019202030',
        ])->assignRole('administrador');

        // Asignación del rol
        //$user->assignRole('administrator');

        $user = User::create([
            'name'     => 'cordinador',
            'email'    => 'cordinador@gmail.com',
            'password' => bcrypt('12345678'),
            'career'         => 'Ninguna',
            'activity'       => 'Ninguna',
            'control_number' => '2019202040',
        ])->assignRole('cordinador');

        //$user->assingRole('coordinator');*/
    }
}
