<?php

use App\Enums\Organizations;
use App\Enums\Status;
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
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('organization')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('area_of_collaboration')->nullable();
            $table->string('agreement_file');
            $table->enum('organization_type', Organizations::getValues())->default(Organizations::OTHER);
            $table->enum('status', Status::getValues())->default(Status::New);
            $table->string('logo')->nullable();
            $table->string('sponsorship_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
