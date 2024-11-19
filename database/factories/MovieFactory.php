<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genresMovie = ['Drama', 'Action', 'Animation', 'Sci-Fi', 'Horror'];
        shuffle($genresMovie);
        return [
            'title' => fake()->words(rand(3, 5), true),
            'director' => fake()->name(),
            'summary' => fake()->paragraph(),
            'genres' => $genresMovie[0]. ',' . $genresMovie[2] . ',' . $genresMovie[1],
        ];
    }
}
