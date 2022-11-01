<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'email' => 'suarezbn@gmail.com',
            'password' => bcrypt('password')
        ]);
        // Asignación del rol
        $user->assignRole('Operador');


        
        \App\Models\Client::factory(500)->create();

        $this->call([
            ResiduoTipoSeeder::class,
            ResiduoStatusSeeder::class
        ]);


    }
}
