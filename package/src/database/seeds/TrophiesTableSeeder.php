<?php

use Carbon\Carbon;
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
        // TODO: Get factories working
        /* factory(App\Trophy::class)->create([
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
        ]); */
        DB::table(config('showcase.table_prefix').'trophies')->insert([
            'name' => 'Sample Box Item',
            'link' => 'http://google.com',
            'image_url' => 'https://lorempixel.com/300/200',
            'description' => 'A boring item which links somewhere.',
            'display_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table(config('showcase.table_prefix').'trophies')->insert([
            'name' => 'Sample Sheet Item',
            'link' => 'http://google.com',
            'image_url' => 'https://lorempixel.com/300/200',
            'description' => 'A boring item which links somewhere.',
            'display_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
