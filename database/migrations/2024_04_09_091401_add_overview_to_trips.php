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
        Schema::table('trips', function (Blueprint $table) {
            $table->text('overview')->nullable();
            $table->text('brief_itinerary')->nullable();
            $table->text('details_itinerary')->nullable();
            $table->text('trip_includes')->nullable();
            $table->text('trip_excludes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn('overview');
            $table->dropColumn('brief_itinerary');
            $table->dropColumn('details_itinerary');
            $table->dropColumn('trip_includes');
            $table->dropColumn('trip_excludes');
        });
    }
};
