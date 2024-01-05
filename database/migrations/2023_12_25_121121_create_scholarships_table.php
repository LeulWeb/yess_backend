<?php

use App\Enums\CurrencyEnum;
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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('funding_amount');
            $table->enum('currency',CurrencyEnum::getValues())->default(CurrencyEnum::ETB);
            $table->tinyText('eligibility_criteria')->nullable();
            $table->date('deadline')->nullable();
            $table->text('application_process')->nullable();
            $table->unsignedInteger('program_duration')->nullable();
            $table->string('funding_source')->nullable();
            $table->string('institution');
            $table->string('program');
            $table->string('link');
            $table->string('cover')->nullable();
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
