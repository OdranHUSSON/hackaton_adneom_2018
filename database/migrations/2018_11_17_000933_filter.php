<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Filter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('task_count')->nullable();
            $table->integer('delay')->nullable();

            $table->unsignedInteger('task_category_id')->nullable();
            $table->foreign('task_category_id')->references('id')->on('task_category');

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
        Schema::dropIfExists('filter');
    }
}
