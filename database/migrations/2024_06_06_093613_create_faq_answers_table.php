<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('faq_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_id')
                  ->constrained('faq_questions')
                  ->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users'); // Assuming there's a users table
            $table->text('answer');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_answers');
    }
}

