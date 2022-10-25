<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Administrador', 'Operador', 'Contador', 'Guest'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

    }
}
// "access_token": "1|kC3uP4yExXqza9d3PUFZJgbhacTBhDhXbBIxHMGv",
// "token_type": "Bearer"
