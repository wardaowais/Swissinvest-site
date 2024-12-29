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
        Schema::create('member_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialities_id');
            $table->foreignId('ttile_id');
            $table->string('title');
            $table->text('description');
            $table->string('event_url');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_events');
    }
};
