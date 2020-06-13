<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'crear_usuario']);
        Permission::create(['name' => 'editar_usuario']);
        Permission::create(['name' => 'mostrar_usuario']);
        Permission::create(['name' => 'eliminar_usuario']);
        Permission::create(['name' => 'usuario_index']);
        Permission::create(['name' => 'crear_residencia']);
        Permission::create(['name' => 'editar_residencia']);
        Permission::create(['name' => 'mostrar_residencia']);
        Permission::create(['name' => 'eliminar_residencia']);
        Permission::create(['name' => 'residencia_index']);
        Permission::create(['name' => 'crear_servicio']);
        Permission::create(['name' => 'editar_servicio']);
        Permission::create(['name' => 'mostrar_servicio']);
        Permission::create(['name' => 'eliminar_servicio']);
        Permission::create(['name' => 'servicio_index']);
        Permission::create(['name' => 'crear_materiales']);
        Permission::create(['name' => 'editar_materiales']);
        Permission::create(['name' => 'mostrar_materiales']);
        Permission::create(['name' => 'eliminar_materiales']);
        Permission::create(['name' => 'materiales_index']);
        Permission::create(['name' => 'crear_visitante']);
        Permission::create(['name' => 'editar_visitante']);
        Permission::create(['name' => 'mostrar_visitante']);
        Permission::create(['name' => 'eliminar_visitante']);
        Permission::create(['name' => 'visitante_index']);
        Permission::create(['name' => 'generar_pdf']);
        Permission::create(['name' => 'subir_pdf']);
    }
}
