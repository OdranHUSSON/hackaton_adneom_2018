<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('task_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->text('description');
            $table->integer('type')->nullable();
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->text('description');
            $table->unsignedInteger('task_category_id')->nullable();
            $table->foreign('task_category_id')->references('id')->on('task_category');
            $table->integer('type')->default(0);
            $table->timestamps();
        });

        // Populate db

        DB::table('task_category')->insert(
            array(
                'label' => 'Recyclage',
                'description' => 'Recyclage'
            )
        );

        DB::table('task_category')->insert(
            array(
                'label' => 'Transport',
                'description' => 'Transport'
            )
        );


        DB::table('task_category')->insert(
            array(
                'label' => 'Achats alimentaires',
                'description' => 'Achats alimentaires'
            )
        );

        DB::table('task_category')->insert(
            array(
                'label' => 'Anti gaspi (écono-logie)',
                'description' => 'Anti gaspi (écono-logie)'
            )
        );

        DB::table('task_category')->insert(
            array(
                'label' => 'Enfants',
                'description' => 'Enfants'
            )
        );

        DB::table('task_category')->insert(
            array(
                'label' => 'Habitation',
                'description' => 'Habitation'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_category');
    }
}
