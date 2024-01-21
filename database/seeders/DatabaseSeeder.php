<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Education;
use App\Models\JobRequest;
use App\Models\Volunteer;
use App\Models\Youth;
use App\Models\LeaderBoard;
use App\Models\ScholarshipRequest;
use App\Models\Startup;

use App\Models\Training;
use App\Models\VolunteerApplication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UserSeeder::class);
        \App\Models\User::factory(5)->create();
         \App\Models\Scholarship::factory(5)->create();
        \App\Models\Faq::factory(5)->create();
        \App\Models\Job::factory(5)->create();
        Youth::factory(10)->create();
        Education::factory(10)->create();
        Startup::factory(10)->create();
        Volunteer::factory(10)->create();
        Training::factory(10)->create();
        ScholarshipRequest::factory(10)->create();
        JobRequest::factory(10)->create();
        VolunteerApplication::factory(10)->create();
    }
}
