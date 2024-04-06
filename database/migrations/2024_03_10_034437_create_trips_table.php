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
        Schema::create('trips', function (Blueprint $table) {

            Schema::dropIfExists('trips');

            $table->id();
            $table->string('name');
            $table->text('highlights')->nullable();
            $table->string('actual_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('trip_day')->nullable();
            $table->string('level')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
