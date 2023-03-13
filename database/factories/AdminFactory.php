<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id'=> 'ADM001',
            'id_user' => 1,
            'reff' => 'ADMIN',
        ];
    }
}
