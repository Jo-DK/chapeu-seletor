<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'class' => fake()->randomElement(['Guerreiro', 'Mago', 'Arqueiro', 'Clérigo']),
            'xp' =>fake()->numberBetween(0, 100)
        ];
    }
}
