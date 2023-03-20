<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Serie>
 */
class SerieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = str_replace('.', '', fake()->realTextBetween('5', '20'));
        $slug = strtolower(str_replace(' ', '-', $title));
        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->realText,
            'release_at' => fake()->date(),
            'seasons' => fake()->numberBetween(1, 22),
            'episodes' => fake()->numberBetween(12, 200),
            'director' => fake()->name(),
            'preview_image' => 'https://api.lorem.space/image/movie',
            'available' => fake()->numberBetween(0, 1)
        ];
    }
}
