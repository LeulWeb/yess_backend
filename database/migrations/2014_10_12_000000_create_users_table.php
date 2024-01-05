<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table)
         {
            $table->id();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('role',['user','admin','member'])->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('locations')->nullable();
            $table->text('interest')->nullable();
            $table->string('skill')->nullable();
            $table->enum('status', ['active','inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
