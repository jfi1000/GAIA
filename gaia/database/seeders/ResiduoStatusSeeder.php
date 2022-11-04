<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResiduoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residuo_status')->insert([[
            'status' => 'status1',
            'status_type' => 'operativo',
        ],[
            'status' => 'status2',
            'status_type' => 'operativo',
        ],[
            'status' => 'status3',
            'status_type' => 'operativo',
        ],[
            'status' => 'status4',
            'status_type' => 'financiero',
        ],[
            'status' => 'status5',
            'status_type' => 'financiero',
        ],[
            'status' => 'status6',
            'status_type' => 'financiero',
        ]
        ]);

    }
}
