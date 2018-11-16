<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('description');
            $table->integer('type')->nullable();
            $table->timestamps();
        });

        Schema::create('task_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('description');
            $table->integer('type')->nullable();
            $table->unsignedInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks');
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
        Schema::dropIfExists('task_category');
        Schema::dropIfExists('tasks');
    }
}
