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
        Schema::table('feedback_members', function (Blueprint $table) {
            $table->string('rating')->after('details')->nullable(); // Adjust type if needed
            $table->string('recommend')->after('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback_members', function (Blueprint $table) {
            $table->dropColumn(['rating','recommend']);
        });
    }
};
