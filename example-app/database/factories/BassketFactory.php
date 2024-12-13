<?php

namespace Database\Factories;

use App\Models\Bassket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bassket>
 */
class BassketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Customer' => $this->faker->name(),
        ];
    }
}
