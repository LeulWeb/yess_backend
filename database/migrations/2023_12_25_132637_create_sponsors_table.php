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
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id('sponsor_id');            
            $table->string('organization');
            $table->string('email'); 
            $table->string('area_of_collaboration'); 
            $table->string('agreemet_file'); 
            $table->enum('organization_type', ['Type1', 'Type2', 'Type3']);
            $table->string('status'); 
            $table->string('logo');
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
