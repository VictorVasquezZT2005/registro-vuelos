<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            "admin", // Superusuario, puede hacer todo
            "gestor_vuelos", // Puede crear, editar y eliminar vuelos
            "gestor_reservaciones", // Puede ver y administrar reservas de los clientes
            "agente", // Puede ayudar a los usuarios a crear reservas
            "contabilidad", // Acceso a finanzas, pagos y reportes
            "soporte", // Atención al cliente y resolución de incidencias
            "moderador", // Opcional, puede revisar acciones y registros del sistema
        ];

        // Elimina roles que no estén en la lista
        Role::whereNotIn("name", $roles)->delete();

        // Crea los roles si no existen
        foreach ($roles as $rol) {
            Role::firstOrCreate(["name" => $rol]);
        }
    }
}
