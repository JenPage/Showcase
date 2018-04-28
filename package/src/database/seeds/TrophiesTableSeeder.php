<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrophiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Trophy::class)->create([
            'name' => 'Sample Box Item',
            'link' => 'http://google.com',
            'image_url' => 'https://lorempixel.com/300/200',
            'description' => 'A boring item which links somewhere.',
            'display_id' => 1
        ]);
        factory(App\Trophy::class)->create([
            'name' => 'Sample Sheet Item',
            'link' => 'http://google.com',
            'image_url' => 'https://lorempixel.com/300/200',
            'description' => 'A boring item which links somewhere.',
            'display_id' => 2
        ]);
    }
}
