<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisplaysTableSeeder extends Seeder
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
        DB::table(config('showcase.table_prefix').'displays')->insert([
            'name' => 'Sample Box',
            'component_view' => 'box',
            'default_trophy_component_view' => 'default',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table(config('showcase.table_prefix').'displays')->insert([
            'name' => 'Sample Sheet',
            'component_view' => 'sheet',
            'default_trophy_component_view' => 'description',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
