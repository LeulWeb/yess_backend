<?php

use App\Enums\AgeGroup;
use App\Enums\Status;
use App\Enums\VolunteerActivities;
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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('target_community')->nullable();
            $table->enum('status', Status::getValues())->default(Status::New);
            $table->string('location');
            $table->string('image')->nullable();
            $table->enum('activity_type', VolunteerActivities::getValues())->default(VolunteerActivities::OTHER);
            $table->enum('age_group', AgeGroup::getValues())->default(AgeGroup::NOT_FOR_PEOPLES);
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
