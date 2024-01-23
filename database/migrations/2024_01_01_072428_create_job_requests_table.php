<?php

use App\Models\User;
use App\Enums\JobSchedule;
use App\Enums\EducationLevel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('position');
            $table->string('linkedIn')->nullable();
            $table->string('resume');
            $table->enum('job_type', [JobSchedule::getValues()])->default(JobSchedule::FULLTIME);
            $table->string('fieldOfStudy')->nullable();
            $table->enum('educationLevel', [EducationLevel::getValues()])->default(EducationLevel::OTHER);
            $table->boolean('is_visible')->default(true);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requests');
    }
};
