<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuccessFilter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_filter', function (Blueprint $table) {
            $table->unsignedInteger('success_id')->nullable();
            $table->foreign('success_id')->references('id')->on('success');

            $table->unsignedInteger('filter_id')->nullable();
            $table->foreign('filter_id')->references('id')->on('filter');

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
        Schema::dropIfExists('success_filter');
    }
}
