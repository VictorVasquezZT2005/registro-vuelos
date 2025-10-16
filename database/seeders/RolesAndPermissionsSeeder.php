<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::create(['name' => 'gestionar usuarios']);
        Permission::create(['name' => 'ver clientes']);
        Permission::create(['name' => 'editar clientes']);
        // ... puedes añadir más permisos aquí

        // Crear roles y asignar permisos existentes
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('gestionar usuarios');
        $roleAdmin->givePermissionTo('ver clientes');
        $roleAdmin->givePermissionTo('editar clientes');

        $roleOperator = Role::create(['name' => 'operador']);
        $roleOperator->givePermissionTo('ver clientes');

        // --- SECCIÓN MODIFICADA ---
        // Crear el usuario admin con los datos de tu base de datos anterior
        $user = User::firstOrCreate(
            ['email' => 'vvasquezdv2016@gmail.com'], // <-- Correo actualizado
            [
                'name' => 'Admin', // <-- Nombre actualizado
                'password' => bcrypt('20210149'), // La contraseña será 'password', puedes cambiarla
                'rol' => 'admin',
            ]
        );
        $user->assignRole($roleAdmin);
    }
}

