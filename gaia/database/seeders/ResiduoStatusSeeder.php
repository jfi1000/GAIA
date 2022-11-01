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
        ],[
            'status' => 'status2',
        ],[
            'status' => 'status3',
        ],[
            'status' => 'status4',
        ],[
            'status' => 'status5',
        ],[
            'status' => 'status6',
        ]
        ]);

    }
}
