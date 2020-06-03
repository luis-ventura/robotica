<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        //$role->givePermissionTo('user_create','user_edit', 'user_show', 'user_delete');
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'coordinator']);
        $role->givePermissionTo('user_create','user_show','user_edit','user_index',
        'residencia_create','residencia_edit','residencia_show','residencia_delete',
        'servicio_create','servicio_edit','servicio_show','servicio_delete',
        'materiales_create','materiales_edit','materiales_show','materiales_delete',
        'visitante_create','visitante_edit','visitante_show','visitante_delete','generar_pdf');
        //$role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo('user_show','user_edit');
    }
}
