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
            $table->enum('job_contract', ['Fulltime', 'Parttime','Contractual'])->nullable()->after('city_id');
            $table->string('salary')->nullable()->after('job_contract');
            $table->string('address')->nullable()->after('salary');
            $table->string('email')->nullable()->after('address');
            $table->string('phone')->nullable()->after('email');
            $table->string('opening_hour')->nullable()->after('phone');
            $table->enum('priority', ['Urgent', 'Normal'])->nullable()->after('opening_hour');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn(['job_contract', 'salary', 'address','email','phone','opening_hour','priority']);
        });
    }
};
