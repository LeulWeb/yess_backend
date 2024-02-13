<?php

namespace Database\Factories;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $is_playlist = $this->faker->boolean();

        $youtubeUrls = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';        

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(2),
            'youtube_links' => $is_playlist ? null : $youtubeUrls,
            'trainer_id' => function () {
                return Trainer::factory()->create()->id;
            },
            'image' => fake()->imageUrl(),
            'playlist_link' => $is_playlist ? fake()->url() : null,

        ];
    }
}
