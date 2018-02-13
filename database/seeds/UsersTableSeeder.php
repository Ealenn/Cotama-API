<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'id' => 1,
            'email' => 'dev@cotama.fr',
            'password' => bcrypt('tLH9cAZ3gbfNgaWB'),
            'pseudo' => 'DevTama'
        ]);
    }
}
