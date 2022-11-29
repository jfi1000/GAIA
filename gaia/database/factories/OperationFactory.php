<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\ResiduoTipo;

class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'weight' =>  $this->faker->randomFloat(2,800,1500) ,
                'date_operation' => now(),
                'id_client' => Client::all()->random()->id,
                'id_residuo' => ResiduoTipo::all()->random()->id,
                'qr' =>  Str::random(10),
                // \App\Models\operation_status::factory(1)->create(),
        ];
    }
}
