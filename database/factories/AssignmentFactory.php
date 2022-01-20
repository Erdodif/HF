<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id' => random_int(1, 10),
            'title' => $this->faker->words(random_int(3,12),true),
            'description' => $this->faker->words(random_int(20,120),true),
            'class_id' => random_int(1,3),
            'due' => $this->faker->dateTimeBetween('now - 3 days','+ 30 days')
        ];
    }
}
