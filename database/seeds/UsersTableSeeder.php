<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Creación del usuario
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('administrator');
        
        // Asignación del rol
        //$user->assignRole('administrator');

        $user = User::create([
            'name'     => 'cordinador',
            'email'    => 'cordinador@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('coordinator');

        //$user->assingRole('coordinator');*/
    }
}