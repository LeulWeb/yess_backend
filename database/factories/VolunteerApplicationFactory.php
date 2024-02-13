<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VolunteerApplication>
 */
class VolunteerApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersId = User::pluck('id');
        $volunteerId = Volunteer::pluck('id');



        

        return [
            'user_id' => $this->faker->randomElement($usersId),
            'volunteer_id' => $this->faker->randomElement($volunteerId),
             'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            'message' => $this->faker->text(),
        'phoneNumber'=>$this->faker->phoneNumber(),
        ];
    }
}
