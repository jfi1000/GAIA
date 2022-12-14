<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        // \App\Models\User::factory(1)->create();
        $user = User::create([
            'name' => 'jose farias',
            'email' => 'jf.izaguirre@gmail.com',
            'password' => bcrypt('password')
        ]);
        // Asignación del rol
        $user->assignRole('Administrador');


        $user = User::create([
            'name' => 'pao suarez',
            'email' => 's@gmail.com',
            'password' => bcrypt('password')
        ]);
        // Asignación del rol
        $user->assignRole('Administrador');


        
        \App\Models\Client::factory(100)->create();

        $this->call([
            ResiduoTipoSeeder::class,
            ResiduoStatusSeeder::class
        ]);

        \App\Models\Operation::factory(300)->create();
        \App\Models\operation_status::factory(300)->create();
    }
}
