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
        $paciente = Role::firstOrCreate(['name' => 'paciente']);
        $enfermero = Role::firstOrCreate(['name' => 'enfermero']);

        // Crear permisos si no existen
        $permissions = [
            'asignaservicios',
            'consultas',
            'disponibles',
            'medicos',
            'pacientes',
            'servicios',
            'triajes',
            'products',
            'asignroles',

        ];

        //despues de hacer cambios aqui, usar este comando ->   php artisan db:seed --class=RoleSeeder
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a los roles
        $admin->syncPermissions(['products','asignaservicios','disponibles','medicos','servicios','asignroles']);
        $medico->givePermissionTo(['products','triajes','pacientes']);
        $paciente->givePermissionTo(['products','consultas','servicios']); //paciente solo puede ver las servicios
        $enfermero->givePermissionTo(['products','triajes']);

        // Asignar el rol 'admin' al usuario con ID 1
        $user = User::find(1); // Cambia el ID si es necesario
        if ($user) {
            $user->assignRole($admin);
        }
    }
}
