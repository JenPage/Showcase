<?php

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
        factory(App\Display::class)->create([
            'name' => 'Sample Box',
            'component_view' => 'display_box'
        ]);
        factory(App\Display::class)->create([
            'name' => 'Sample Sheet',
            'component_view' => 'display_sheet'
        ]);
    }
}
