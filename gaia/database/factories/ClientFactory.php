<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'RFC' => $this->faker->regexify('[A-Z]{6}[0-4]{4}'),
            'email' => $this->faker->unique()->safeEmail(),
            'movil' => $this->faker->phoneNumber(),
            'razon_social' => $this->faker->name(),
            'type' => $this->faker->randomElement($array = array ('Persona Moral','Persona Física')),


        ];
    }
}
