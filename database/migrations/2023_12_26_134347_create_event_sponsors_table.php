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
        Schema::create('event_sponsors', function (Blueprint $table) {
            $table->id('event_sponsor_id');
            $table->string('sponsor_level');
            $table->string('sponsorship_type');
            $table->text('description');
            // $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('sponsor_id');
            // $table->foreign('sponsor_id')->references('sponsor_id')->on('sponsors')->onDelete('cascade');
            //$table->foreign('partner_id')->references('partner_id')->on('partners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_sponsors');
    }
};
