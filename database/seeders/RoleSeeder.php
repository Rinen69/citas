<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear roles si no existen
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $medico = Role::firstOrCreate(['name' => 'medico']);
        $enfermero = Role::firstOrCreate(['name' => 'enfermero']);

        // Crear permisos si no existen
        $permissions = [
            'products',     // Permiso para gestionar stocks
        ];

        // Crear los permisos en la base de datos si no existen
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a los roles
        $admin->syncPermissions(['products']);
        $medico->givePermissionTo(['products']);
        $enfermero->givePermissionTo(['products']);

        // Asignar el rol 'admin' al usuario con ID 1
        $user = User::find(1); // Cambia el ID si es necesario
        if ($user) {
            $user->assignRole($admin);
        }
    }
}
