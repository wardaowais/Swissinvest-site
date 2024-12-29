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
        Schema::create('web_contents', function (Blueprint $table) {
            $table->id();
            $table->text('main_header_cover_title');
            $table->text('main_header_title');
            $table->text('main_header_cardi_title');
            $table->text('main_header_cardi_desc');
            $table->text('main_header_cardii_title');
            $table->text('main_header_cardii_desc');
            $table->text('main_header_cardiii_title');
            $table->text('main_header_cardiii_desc');
            $table->text('main_header_cardiv_title');
            $table->text('main_header_cardiv_desc');
            $table->text('main_header_cardv_title');
            $table->text('main_header_cardv_desc');
            $table->text('main_header_cardvi_title');
            $table->text('main_header_cardvi_desc');
            $table->text('main_header_center_title');
            $table->text('main_header_center_text');
            $table->text('main_header_center_left_top_title');
            $table->text('main_header_center_left_top_title_desc');
            $table->text('main_header_center_left_bottom_title');
            $table->text('main_header_center_left_bottom_title_desc');
            $table->text('main_header_center_left_right_title');
            $table->text('main_header_center_left_right_title_desc');
            $table->text('main_header_footer_title');
            $table->text('main_header_footer_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_contents');
    }
};
