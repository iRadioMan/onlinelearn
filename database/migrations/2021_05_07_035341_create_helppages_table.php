<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelppagesTable extends Migration
{
    public function up()
    {
        Schema::create('helppages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("main_file");
        });
    }

    public function down()
    {
        Schema::dropIfExists('helppages');
    }
}
