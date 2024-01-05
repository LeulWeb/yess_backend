<?php

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
        Schema::create('trainer_enrollments', function (Blueprint $table) {

            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('training_id');
            $table->text('status');

            $table->foreign('trainer_id')->references('trainer_id')->on('trainers');
            $table->foreign('training_id')->references('training_id')->on('trainings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_enrollments');
    }
};
