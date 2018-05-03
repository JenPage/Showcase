<?php

use Illuminate\Database\Seeder;

class ShowcaseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DisplaysTableSeeder::class);
        $this->call(TrophiesTableSeeder::class);
        $this->call(DisplayTrophyTableSeeder::class);
    }
}
