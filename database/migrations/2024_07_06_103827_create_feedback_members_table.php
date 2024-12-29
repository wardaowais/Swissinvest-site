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
        Schema::create('feedback_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('subject');
            $table->text('details');
            $table->enum('priority', ['normal', 'high', 'medium'])->default('normal');
            $table->string('is_read')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_members');
    }
};
