<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Operation;
use App\Models\operation_status;
use App\Models\User;

class operation_statusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status_id' => 1,
            'operation_id' => Operation::all()->random()->id,
            'user_id' => User::all()->random()->id, 
        ];
    }
}
