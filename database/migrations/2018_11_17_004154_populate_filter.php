<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateFilter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('filter')->insert([
            'task_category_id' => 2,
            'success_id' => 1,
        ]);

        DB::table('filter')->insert([
            'task_category_id' => 1,
            'success_id' => 2,
        ]);

        DB::table('filter')->insert([
            'task_count' => 5,
            'success_id' => 3,
        ]);

        DB::table('filter')->insert([
            'task_count' => 10,
            'success_id' => 4,
        ]);

        DB::table('filter')->insert([
            'task_count' => 20,
            'success_id' => 5,
        ]);

        DB::table('filter')->insert([
            'task_count' => 50,
            'success_id' => 6,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
