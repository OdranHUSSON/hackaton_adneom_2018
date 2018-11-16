<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class PopulateSuccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('success')->insert([
            'label' => 'Le transporteur',
            'xp' => 100,
            'description' => 'Réussir toutes les tâches de transport',
        ]);

        DB::table('success')->insert([
            'label' => 'Le recycleur',
            'xp' => 90,
            'description' => 'Réussir totues les tâches de recyclage',
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
