<?php

use App\Enums\EducationLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->enum('education_level', EducationLevel::getValues())->default(EducationLevel::BACHELOR_DEGREE);
            $table->string('field_of_study')->nullable();
            $table->string('grade')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('document')->nullable();
            $table->text('award')->nullable();
            $table->text('achievement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
