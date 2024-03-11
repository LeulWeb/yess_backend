<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->name,
            'description'=>fake()->paragraph(),            
            'youtube_links'=>fake()->url(),
            'training_id' => function () {
                return Training::factory()->create()->id;
            },
            
            
            //
        ];
    }
}
