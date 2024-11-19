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
        $genres_movie = ['Drama', 'Action', 'Animation', 'Sci-Fi', 'Horror'];
        shuffle($genres_movie);
        return [
            'title' => fake()->words(rand(3, 5), true),
            'director' => fake()->name(),
            'summary' => fake()->paragraph(),
            'genres' => $genres_movie[0]. ',' . $genres_movie[2] . ',' . $genres_movie[1],
        ];
    }
}
