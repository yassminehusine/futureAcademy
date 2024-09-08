<?php

namespace Database\Factories;

use App\Models\departmentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coursesModel>
 */
class coursesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'course_name' => fake()->name(),
           'department_number' => "C" . fake()->unique()->numberBetween(1,999),
            'credit_hours' => fake()->numberBetween(1,3),
            'description' => fake()->sentence(4),
            'image' => "image\courseImages\1725471267motherboard-circuit-technology-background-vector-gradient-blue_53876-126034.avif",
            'department_id' => "2",

        ];
    }
}
