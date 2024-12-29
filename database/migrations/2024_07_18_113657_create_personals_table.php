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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name')->nullable();
            $table->string('mini_upper_subtitle')->nullable();
            $table->longText('header_paragraph')->nullable();
            $table->string('slider_status')->nullable();

            $table->longText('about_header')->nullable();
            $table->longText('about_description')->nullable(); // this one
            $table->string('about_status')->nullable();
            $table->string('about_image')->nullable();
            

            $table->string('working_hours')->nullable();
            $table->longText('working_hours_description')->nullable();
            $table->string('working_hours_status')->nullable();

            $table->string('our_service_header')->nullable();
            $table->longText('our_service_description')->nullable();
            $table->string('our_service_status')->nullable();

            $table->string('blog_header')->nullable();
            $table->longText('blog_description')->nullable();
            $table->string('blog_header_status')->nullable();


            $table->string('contact_header')->nullable();
            $table->longText('contact_description')->nullable();
            $table->string('contact_status')->nullable();

            $table->string('mobile_header')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email_header')->nullable();
            $table->string('email')->nullable();
            $table->string('address_header')->nullable();
            $table->string('address')->nullable();

            $table->string('section_status')->nullable();
            $table->string('social_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
