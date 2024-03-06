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

        $youtubeUrls = [
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            // Add more YouTube links as needed
        ];

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(2),
            'youtube_links' =>  $youtubeUrls,

            'trainer_id' => function () {
                return Trainer::factory()->create()->id;
            },

            'popular' => fake()->boolean(),

        ];
    }
}
