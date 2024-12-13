<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title'=> $this->faker->text(100),
            'Price'=> $this->faker->randomNumber(3),
            'Amount'=> $this->faker->randomNumber(2),
        ];
    }
}
