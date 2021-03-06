<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FoyersTableSeeder::class);
        $this->call(HouseworkTableSeeder::class);
        $this->call(StateTableSeeder::class);
    }
}
