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
        $youtubeUrls = ['https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'https://www.youtube.com/watch?v=3JZ_D3ELwOQ'];

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(2),
            'youtube_links' => fake()->randomElement($youtubeUrls),
            'trainer_id' => function () {
                return Trainer::factory()->create()->id;
            },
            'playlist_link' => fake()->url(),
            
        ];
    }
}
