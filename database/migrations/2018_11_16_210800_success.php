<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Success extends Migration
{
    public function up()
    {
        Schema::create('success', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->integer('xp');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('success');
    }
}
