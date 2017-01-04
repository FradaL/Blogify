<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addSlideTable extends Migration {

    public function up()
    {
        Schema::create('slide', function(Blueprint $table) {
            $table->increments('id');
            $table->string('source');
            $table->integer('position');
        });
    }

    public function down()
    {
        Schema::dropIfExists('slide');
    }
}