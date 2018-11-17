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

        DB::table('success')->insert([
            'label' => '5 tâches',
            'xp' => 10,
            'description' => 'Réussir 5 tâches',
        ]);

        DB::table('success')->insert([
            'label' => '10 tâches',
            'xp' => 20,
            'description' => 'Réussir 10 tâches',
        ]);

        DB::table('success')->insert([
            'label' => '20 tâches',
            'xp' => 40,
            'description' => 'Réussir 20 tâches',
        ]);

        DB::table('success')->insert([
            'label' => '50 tâches',
            'xp' => 100,
            'description' => 'Réussir 50 tâches',
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
