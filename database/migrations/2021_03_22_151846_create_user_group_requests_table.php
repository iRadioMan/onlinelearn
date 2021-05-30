<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('user_group_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('user_groups')->cascadeOnDelete();

            $table->foreignId('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('group_request_statuses')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_group_requests');
    }
}
