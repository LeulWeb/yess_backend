<?php

namespace Database\Factories;

use App\Enums\JobSector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Startup>
 */
class StartupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name,
        'description'=>fake()->paragraph(),
        'logo'=>fake()->imageUrl,
        'image'=>fake()->imageUrl,
        'sector'=>fake()->randomElement(JobSector::getValues()),
        'product_service'=>fake()->paragraph,
        'employees'=>fake()->numberBetween(0,120),
        'founder'=>fake()->name,
        'contact_email'=>fake()->email(),
        'contact_phone'=>fake()->phoneNumber(),
        'location'=>fake()->address,
        'website'=>fake()->url(),
        'facebook'=>fake()->url(),
        'linkedin'=>fake()->url(),
        'instagram'=>fake()->url(),
        'telegram'=>fake()->url()
        ];
    }
}
