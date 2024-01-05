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
        Schema::create('education', function (Blueprint $table) {
            $table->id('education_id');
            // $table->unsignedBigInteger('user_id');
            $table->string('education_level');
            $table->text('field_of_study');
            $table->bigInteger('grade');
            $table->date('graduation_date');
            $table->text('document');
            $table->text('award');
            $table->text('description');
            // $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');


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
