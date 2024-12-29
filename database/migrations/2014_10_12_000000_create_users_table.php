<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('role')->default('user');
            $table->string('gender')->nullable();
            $table->date('age')->nullable();
            $table->foreignId('country')->nullable();
            $table->foreignId('city')->nullable();
            $table->string('language')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('phone')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('Speaking_Languages')->nullable();
            $table->text('address')->nullable();
            $table->string('fees')->nullable();
            $table->enum('service_type', ['onsite', 'remote', 'both'])->default('onsite');
            $table->string('speciality')->nullable();
            $table->foreignId('specialties')->nullable();
            $table->string('sxpertise')->nullable();
            $table->string('Access_info')->nullable();
            $table->text('healthcare_professional_info')->nullable();
            $table->text('about_me')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('otp')->nullable();
            $table->string('is_online')->default(1);
            $table->string('is_active')->default(0);
            $table->string('token')->default(0);
            $table->string('status')->default(0);
            $table->string('title')->nullable();
            $table->string('house_number')->nullable();
            $table->string('hin_email')->nullable();
            $table->string('fax_phone_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('reviwes')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
