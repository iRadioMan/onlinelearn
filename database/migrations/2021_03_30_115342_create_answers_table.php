<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("question_id");
            $table->foreign("question_id")->references('id')->on('questions')->cascadeOnDelete();
            $table->foreignId("question_option_id");
            $table->foreign("question_option_id")->references('id')->on('question_options')->cascadeOnDelete();
            $table->foreignId("user_id");
            $table->foreign("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->unique(['question_id', 'question_option_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
