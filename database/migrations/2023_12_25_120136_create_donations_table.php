<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table)
        {
            $table->id('donation_id');
            $table->decimal('amount', 8, 2);
            $table->string('currency');
            $table->text('description');
            $table->enum('donation_type', ['yearly', 'monthly', 'once']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
