<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'code' => 'ATTRIBUER',
                'fr' => 'Attribuer',
                'en' => 'Attribute',
                'de' => 'Auszeichnung',
                'color' => '#1976d2'
            ],
            [
                'code' => 'EN_COURS',
                'fr' => 'En cours',
                'en' => 'In progress',
                'de' => 'In arbeit',
                'color' => '#1976d2'
            ],
            [
                'code' => 'TERMINER',
                'fr' => 'Terminer',
                'en' => 'Done',
                'de' => 'Erledigt',
                'color' => '#4caf50'
            ],
            [
                'code' => 'EN_ATTENTE_DEFIS',
                'fr' => 'En attente de défis',
                'en' => 'Wainting for fight',
                'de' => 'Warten auf die herausforderung',
                'color' => '#26a69a'
            ],
            [
                'code' => 'ANNULER',
                'fr' => 'Annuler',
                'en' => 'Cancel',
                'de' => 'Stornieren',
                'color' => '#f44336'
            ]
        ]);
    }
}
