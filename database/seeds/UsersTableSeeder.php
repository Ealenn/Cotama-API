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
            'email' => 'test@test.fr',
            'password' => bcrypt('azerty'),
            'pseudo' => 'Test'
        ]);
    }
}
