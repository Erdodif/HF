<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assignment_id'=>random_int(1,20),
            'user_id'=>random_int(1,10),
            'link'=>$this->faker->url()
        ];
    }
}
