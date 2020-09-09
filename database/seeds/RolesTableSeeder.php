<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'administrador']);
        //$role->givePermissionTo('user_create','user_edit', 'user_show', 'user_delete');
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'cordinador']);
        $role->givePermissionTo('crear_usuario','mostrar_usuario','editar_usuario','usuario_index',
        'crear_residencia','editar_residencia','mostrar_residencia','eliminar_residencia','residencia_index',
        'crear_servicio','editar_servicio','mostrar_servicio','eliminar_servicio','servicio_index',
        'crear_materiales','editar_materiales','mostrar_materiales','eliminar_materiales','materiales_index',
        'crear_visitante','editar_visitante','mostrar_visitante','eliminar_visitante','visitante_index',
        'generar_pdf','mostrar_redes');
        //$role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'estudiante']);
        $role->givePermissionTo('mostrar_usuario','editar_usuario','mostrar_redes');
    }
}
