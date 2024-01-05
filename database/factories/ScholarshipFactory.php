<?php

namespace Database\Factories;

use App\Enums\CurrencyEnum;
use App\Models\Scholarship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholarship>
 */
class ScholarshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Scholarship::class;



    public function definition(): array
    {


        return [
            "title"=>fake()->sentence(3),
            "description"=>fake()->paragraph(3),
            "funding_amount"=>random_int(1000,100000),
            "currency"=>fake()->randomElement(CurrencyEnum::getValues()),
            "eligibility_criteria"=>fake()->paragraph(3),
            "deadline"=>fake()->dateTimeBetween("-5 years","+1 years")->format("Y-m-d"),
            "application_process"=>fake()->paragraph(3),
            "program_duration"=>fake()->randomNumber(4,120),
            "funding_source" => implode(' ', fake()->sentences(3)),
            "institution"=>fake()->company(),
            "program"=>fake()->sentence(3),
            "link"=>fake()->url(),
            "country"=>fake()->country(),
            "cover"=>fake()->imageUrl(),
        ];
    }
}


