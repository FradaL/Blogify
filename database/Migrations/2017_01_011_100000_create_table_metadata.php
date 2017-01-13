<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMetadata extends Migration {

    public function up()
    {
        Schema::create('metadata', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id');
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metadata');
    }
}