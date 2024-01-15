<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Youth>
 */
class YouthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $userWithoutYouth = User::whereDoesntHave('youth')->get();

        return [
            "user_id"=> $userWithoutYouth->random()->id,
            "video_link"=>fake()->url(),
            "image"=>fake()->imageUrl(),
            "is_published"=>fake()->boolean(),
        ];
    }
}
