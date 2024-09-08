<?php

namespace Database\Factories;

use App\Enums\departmentRolse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\departmentModel>
 */
class departmentModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_name' => fake()->name(),
            'description' => fake()->sentence(6),
            'image' => "image\courseImages\1725471267motherboard-circuit-technology-background-vector-gradient-blue_53876-126034.avif",

        ];
    }
}
