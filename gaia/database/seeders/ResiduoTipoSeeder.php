<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResiduoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('residuo_tipos')->insert([[
            'type' => 'tipo1',
            'description' => 'description tipo1',
        ],[
            'type' => 'tipo2',
            'description' => 'description tipo2',
        ],[
            'type' => 'tipo3',
            'description' => 'description tipo3',
        ],[
            'type' => 'tipo4',
            'description' => 'description tipo4',
        ],[
            'type' => 'tipo5',
            'description' => 'description tipo5',
        ],[
            'type' => 'tipo6',
            'description' => 'description tipo6',
        ]
        ]);

    }
}
