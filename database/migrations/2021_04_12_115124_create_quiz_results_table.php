<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResultsTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreign("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId("lesson_id");
            $table->foreign("lesson_id")->references('id')->on('lessons')->cascadeOnDelete();
            $table->double("correct_percentage");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
}
