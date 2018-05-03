<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisplayTrophyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Get factories working
        /* factory(\Showcase\App\Display::class)->create([
            'name' => 'Sample Box',
            'component_view' => 'display_box'
        ]);
        factory(\Showcase\App\Display::class)->create([
            'name' => 'Sample Sheet',
            'component_view' => 'display_sheet'
        ]); */
        DB::table(config('showcase.table_prefix').'display_trophy')->insert([
            'display_id' => 1,
            'trophy_id' => 1
        ]);
        DB::table(config('showcase.table_prefix').'display_trophy')->insert([
            'display_id' => 1,
            'trophy_id' => 2
        ]);
        DB::table(config('showcase.table_prefix').'display_trophy')->insert([
            'display_id' => 2,
            'trophy_id' => 3
        ]);
    }
}
