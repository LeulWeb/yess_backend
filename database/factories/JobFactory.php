<?php

namespace Database\Factories;

use App\Enums\JobSchedule;
use App\Enums\JobSector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomSchedule =  JobSchedule::getValues();
        $randomSector = JobSector::getValues();

        return [
            'title' => fake()->sentence,
            'description' => fake()->sentence,
            'schedule' => fake()->randomElement($randomSchedule),
            'is_remote' => fake()->boolean,
            'sector' => fake()->randomElement($randomSector),
            'location' => fake()->address(),
            'experience' => fake()->randomDigitNotNull,
            'deadline' => fake()->date,
            'responsibilities' => fake()->paragraph,
            'requirements' => fake()->sentence,
            'note' => fake()->paragraph,
            'salary_compensation' => fake()->randomDigitNotNull,
            'opportunities' => fake()->paragraph,
            'vacancies' => fake()->randomDigitNotNull,
            'contact_address' => fake()->address,
            'contact_phone' => fake()->phoneNumber,
            'contact_email' => fake()->email,
            'logo' => fake()->imageUrl,

        ];
    }
}
