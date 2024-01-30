<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;


class ScholarshipRequestFactory extends Factory
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
            'title'=>$this->faker->sentence(3),
            'description'=>$this->faker->paragraph(3),
            'deadline'=>$this->faker->dateTimeBetween('+1 week', '+2 weeks')->format('Y-m-d'),
            'status'=>fake()->randomElement(['new','ongoing','completed']),
            'challenges'=>$this->faker->paragraph(3),
            'solution'=>$this->faker->paragraph(3),
            'help_needed'=>$this->faker->paragraph(3),
            'document'=>fake()->url(),
        ];
    }
}
