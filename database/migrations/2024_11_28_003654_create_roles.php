<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Role::where('name', 'admin')->exists()) {
            $role1 = Role::create(['name' => 'admin']);
        } else {
            $role1 = Role::where('name', 'admin')->first();
        }

        if (!Role::where('name', 'medico')->exists()) {
            $role2 = Role::create(['name' => 'medico']);
        }

        if (!Role::where('name', 'enfermero')->exists()) {
            $role3 = Role::create(['name' => 'enfermero']);
        }
        if (!Role::where('name', 'paciente')->exists()) {
            $role4 = Role::create(['name' => 'paciente']);
        }

        $user = User::find(1);
        if ($user && !$user->hasRole('admin')) {
            $user->assignRole($role1);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('roles');
    }
};
