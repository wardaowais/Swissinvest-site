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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('wallet', 10, 2)->nullable()->after('extension_code');
            $table->boolean('sms_reminder')->nullable()->after('wallet');
            $table->boolean('sms_confirmation')->nullable()->after('sms_reminder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['wallet', 'sms_reminder', 'sms_confirmation']);
        });
    }
};
