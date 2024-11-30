<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guild>
 */
class GuildFactory extends Factory
{

    public array $names = [
        'Ring Society', 'Power Rangers', 'Knights of the Round Table', 'Gryffindor', 'Ravenclaw', 'Hufflepuff', 'Slytherin',
        'Hellfire Club', 'Granddaughters of the Old Barreiro', 'Winterfell Wolves', 'Targarian Dragons', 'Casterly Lions', 'Chicago Bulls',
        'Hells Angels MC', 'Gang Of Four', 'Bob\'s Nephews', 'Rebel Alliance', 'The Dark Side', 'WeatherLight Crew', 'The Highlanders', 'The Avengers',
        'Llanowar Elves', 'Blind Guardians', 'The Children of Asgard'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        shuffle($this->names);
        return [
            'name' => array_pop($this->names)
        ];
    }
}
