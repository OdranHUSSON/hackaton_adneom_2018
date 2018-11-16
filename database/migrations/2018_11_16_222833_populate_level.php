<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('levels')->insert([
            'label' => 'Junior',
            'description' => 'Vous débutez',
            'required_experience' => 0,
        ]);

        DB::table('levels')->insert([
            'label' => 'Medior',
            'description' => 'Vous progressez bien',
            'required_experience' => 500,
        ]);

        DB::table('levels')->insert([
            'label' => 'Senior',
            'description' => 'Vous êtes une machine',
            'required_experience' => 1000,
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
