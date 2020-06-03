<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_edit']);
        Permission::create(['name' => 'user_show']);
        Permission::create(['name' => 'user_delete']);
        Permission::create(['name' => 'user_index']);
        Permission::create(['name' => 'residencia_create']);
        Permission::create(['name' => 'residencia_edit']);
        Permission::create(['name' => 'residencia_show']);
        Permission::create(['name' => 'residencia_delete']);
        Permission::create(['name' => 'residencia_index']);
        Permission::create(['name' => 'servicio_create']);
        Permission::create(['name' => 'servicio_edit']);
        Permission::create(['name' => 'servicio_show']);
        Permission::create(['name' => 'servicio_delete']);
        Permission::create(['name' => 'servicio_index']);
        Permission::create(['name' => 'materiales_create']);
        Permission::create(['name' => 'materiales_edit']);
        Permission::create(['name' => 'materiales_show']);
        Permission::create(['name' => 'materiales_delete']);
        Permission::create(['name' => 'materiales_index']);
        Permission::create(['name' => 'visitante_create']);
        Permission::create(['name' => 'visitante_edit']);
        Permission::create(['name' => 'visitante_show']);
        Permission::create(['name' => 'visitante_delete']);
        Permission::create(['name' => 'visitante_index']);
        Permission::create(['name' => 'generar_pdf']);
        Permission::create(['name' => 'subir_pdf']);
    }
}
