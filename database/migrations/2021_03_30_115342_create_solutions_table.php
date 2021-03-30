<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("question_id");
            $table->foreign("question_id")->references('id')->on('questions')->cascadeOnDelete();
            $table->foreignId("answer_id");
            $table->foreign("answer_id")->references('id')->on('answers')->cascadeOnDelete();
            $table->foreignId("user_id");
            $table->foreign("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->unique(['question_id', 'answer_id', 'user_id']);
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
        Schema::dropIfExists('solutions');
    }
}
