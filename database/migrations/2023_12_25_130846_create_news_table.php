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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('description');
            $table->date('date');
            $table->boolean('is_visible');
            $table->string('tags');
            $table->string('featured');
            $table->string('links')->nullable();
           // $table->unsignedBigInteger('category_id');
           // $table->foreign('category_id')->references('category_id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
