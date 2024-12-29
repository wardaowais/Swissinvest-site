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
        Schema::table('job_posts', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable()->after('job_details');
            $table->foreignId('country_id')->nullable()->after('city_id');
            $table->enum('type', ['onsite', 'hybrid', 'remote'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn(['city_id', 'country_id', 'type']);
        });
    }
};
