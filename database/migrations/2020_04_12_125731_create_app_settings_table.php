<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->string("name")->primary();
            $table->string("value");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
}
