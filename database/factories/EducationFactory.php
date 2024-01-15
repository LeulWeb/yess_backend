<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $userWithoutEducation = User::whereDoesntHave('education')->get();

        return [
            'user_id'=> $userWithoutEducation->random()->id,
            'education_level' => fake()->randomElement(['high_school', 'college', 'university']),
            'field_of_study' => fake()->jobTitle(),
            'grade' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F']),
            'graduation_date' => fake()->date(),
            'document' => fake()->imageUrl(),
            'award' => fake()->paragraph(),
            'achievement' => fake()->paragraph(),
        ];
    }
}
