<?php

use Illuminate\Database\Seeder;

class FoyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Foyer = factory(\App\Models\Foyers\Foyer::class)->make();
        \App\Models\Foyers\Foyer::create(
            \App\User::find(1),
            [
              'name' => $Foyer->name
            ]
        );
    }
}
