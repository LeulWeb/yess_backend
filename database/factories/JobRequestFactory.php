<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\JobSchedule;
use App\Enums\EducationLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobRequest>
 */
class JobRequestFactory extends Factory
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
            'linkedIn'=>fake()->url(),
            'position'=>fake()->sentence(),
            'resume'=>fake()->url(),
            'job_type'=>fake()->randomElement(JobSchedule::getValues()),
            'fieldOfStudy'=>fake()->sentence(),
            'educationLevel'=>fake()->randomElement(EducationLevel::getValues()),
            'is_visible'=>fake()->boolean(),
        ];
    }
}
