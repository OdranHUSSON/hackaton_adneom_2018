<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai trié mes déchets',
                'description' => 'J’ai trié mes déchets',
                'task_category_id' => 1
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai recyclé des vêtements (dons, les déposer dans des points de collecte)',
                'description' => 'J’ai recyclé des vêtements (dons, les déposer dans des points de collecte)',
                'task_category_id' => 1
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai donné un appareil que je n’utilisais plus',
                'description' => 'J’ai donné un appareil que je n’utilisais plus',
                'task_category_id' => 1
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai donné un meuble qui ne me servait plus',
                'description' => 'J’ai donné un meuble qui ne me servait plus',
                'task_category_id' => 1
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai installé un composteur',
                'description' => 'J’ai installé un composteur',
                'task_category_id' => 1
            )
        );

        // Transports

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai pris les transports en commun',
                'description' => 'J’ai pris les transports en commun',
                'task_category_id' => 2,
                'type' => 1
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai laissé ma voiture au garage pour aller au magasin du coin',
                'description' => 'J’ai laissé ma voiture au garage pour aller au magasin du coin',
                'task_category_id' => 2
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai covoituré',
                'description' => 'J’ai covoituré',
                'task_category_id' => 2
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'Circulation alternée pair/impair',
                'description' => 'Circulation alternée pair/impair',
                'task_category_id' => 2
            )
        );

        // Achats alimentaires

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai évité les produit contenant du soja ou de la lécithine de soja',
                'description' => 'J’ai évité les produit contenant du soja ou de la lécithine de soja',
                'task_category_id' => 3
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai acheté des légumes de saisons local',
                'description' => 'Les fraises à Noël ce n’est pas normal',
                'task_category_id' => 3
            )
        );

        DB::table('tasks')->insert(
            array(
                'label' => 'J’ai évité d’acheter l’huile de palme',
                'description' => 'J’ai évité d’acheter l’huile de palme, j’ai préféré l’huile végétale saine comme l’huile de colza ou de tournesol',
                'task_category_id' => 3
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
