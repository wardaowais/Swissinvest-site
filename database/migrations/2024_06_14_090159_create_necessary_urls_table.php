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
        Schema::create('necessary_urls', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('cat_id')->constrained('necessary_categories')->onDelete('cascade'); // This line ensures cat_id is an unsignedBigInteger and sets up the foreign key constraint
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('active'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necessary_urls');
    }
};
