<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationRequest>
 */
class DonationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomId = User::pluck('id');



        return [
            'user_id'=>fake()->randomElement($randomId),
            'phone'=>fake()->phoneNumber(),
            'reason'=>$this->faker->paragraph(3),
            'document'=>fake()->url(),
        ];
    }
}
