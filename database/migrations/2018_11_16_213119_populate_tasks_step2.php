<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateTasksStep2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Anti gaspi (écono-logie)
        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai trié mon frigo et utilisé les aliments périmant bientôt',
                'description' => 'J’ai trié mon frigo et utilisé les aliments périmant bientôt',
                'task_category_id' => 4
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai éteint la lumière quand je sortais d’une pièce',
                'description' => 'J’ai éteint la lumière quand je sortais d’une pièce',
                'task_category_id' => 4
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J\'ai acheté des produits à dates courtes',
                'description' => 'J’ai fait mes courses en achetant des produits dates courtes',
                'task_category_id' => 4
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => '',
                'description' => '',
                'task_category_id' => 4
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'Je n’ai pas laissé mes appareils branchés',
                'description' => 'Je n’ai pas laissé mes appareils branchés',
                'task_category_id' => 4
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai pris une (petite) douche au lieu d’un bain',
                'description' => 'J’ai pris une (petite) douche au lieu d’un bain',
                'task_category_id' => 4
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai fermé le robinet quand je me suis brossé les dents',
                'description' => 'J’ai fermé le robinet quand je me suis brossé les dents',
                'task_category_id' => 4
            )
        );


        // Habitation


        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai acheté des panneaux solaires',
                'description' => 'J’ai acheté des panneaux solaires',
                'task_category_id' => 6
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
        //
    }
}
