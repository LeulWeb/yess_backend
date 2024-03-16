<?php

use App\Enums\Gender;
use App\Enums\JobSchedule;
use App\Enums\JobSector;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table)
        {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('schedule', JobSchedule::getValues())->default(JobSchedule::FULLTIME);
            $table->boolean('is_remote')->default(false);
            $table->enum('sector', JobSector::getValues())->default(JobSector::OTHER);
            $table->enum('gender', Gender::getValues())->default(Gender::Both);
            $table->string('location');
            $table->string('experience')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->text('responsibilities')->nullable();
            $table->string('requirements');
            $table->string('note')->nullable();
            $table->string('salary_compensation');
            $table->text('opportunities')->nullable();
            $table->unsignedSmallInteger('vacancies')->nullable();
            $table->mediumText('contact_address');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('logo');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
