<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossaryTable extends Migration
{
    public function up()
    {
        Schema::create('glossary', function (Blueprint $table) {
            $table->id();
            $table->string('term');
            $table->text('definition');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('glossary');
    }
}
