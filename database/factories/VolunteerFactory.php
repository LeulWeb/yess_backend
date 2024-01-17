<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Enums\AgeGroup;
use App\Enums\VolunteerActivities;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Volunteer>
 */
class VolunteerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDateTime = fake()->dateTimeBetween('now', '7 days');
        $endDateTime = fake()->dateTimeBetween($startDateTime, '7 days');

        return [
            'title' => fake()->sentence(3),
            "description" => fake()->paragraph(4),
            "target_community" => fake()->sentence(3),
            "status" => fake()->randomElement(Status::getValues()),
            "location" => fake()->sentence(3),
            "image" => fake()->imageUrl(),
            "activity_type" => fake()->randomElement(VolunteerActivities::getValues()),
            "age_group" => fake()->randomElement(AgeGroup::getValues()),
            "contact_phone" => fake()->phoneNumber(),
            "contact_email" => fake()->email(),
            "start_date" => $startDateTime,
            "end_date" => $endDateTime
        ];
    }
}
